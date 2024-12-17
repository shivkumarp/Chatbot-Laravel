const components = {
    loadingDots: `<span class="loading">
    <span style="background-color: #fff;"></span>
    <span style="background-color: #fff;"></span>
    <span style="background-color: #fff;"></span>
    </span>`,
    thinking:
        '<span class="animate-pulse text-white text-sm">Tinking...</span>',
    chat_user: `
    <div class="ml-16 flex justify-end">
        <di class="bg-[#0071d9] px-4 py-2 rounded-lg min-w-20 rounded-br-none">
            <p class="text-white">{content}</p>
        </di>
    </div>`,
    chat_bot: `
    <div class="bg-[#3e4649] px-4 py-2 rounded-lg mr-16 min-w-20 rounded-bl-none">
        <p class="text-white" id="{id}">{content}</p>
    </div>`,
};

function isUrl(string) {
    try {
        new URL(string);
        return true;
    } catch (error) {
        return false;
    }
}

function getId(length = 6) {
    const characters =
        "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    let result = "";

    for (let i = 0; i < length; i++) {
        const randomIndex = Math.floor(Math.random() * characters.length);
        result += characters.charAt(randomIndex);
    }

    return result;
}

async function markdownToHtml(markdownString) {
    const { unified } = await import("unified");
    const markdown = (await import("remark-parse")).default;
    const remark2rehype = (await import("remark-rehype")).default;
    const rehypeStringify = (await import("rehype-stringify")).default;

    const result = await unified()
        .use(markdown)
        .use(remark2rehype)
        .use(rehypeStringify)
        .process(markdownString);

    return result.value.toString();
}

function handleSubmitIndexing(form) {
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        const link = e.target.link.value;
        const token = e.target._token.value;
        const progress = document.getElementById("progress-text");
        const btn = document.getElementById("btn-submit-indexing");
        progress.style.paddingBottom = "8px";
        btn.innerHTML = components.loadingDots;

        if (!link) return;
        const body = { link };
        fetch("/embedding", {
            headers: {
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-Token": token,
            },
            method: "POST",
            body: JSON.stringify(body),
        })
            .then(async (res) => {
                console.log(res);
                const reader = res.body.getReader();
                const decoder = new TextDecoder();

                let text = "";
                while (true) {
                    const { value, done } = await reader.read();
                    if (done) break;
                    text = decoder.decode(value, { stream: true });
                    progress.innerText = text;
                }

                if (isUrl(text)) {
                    window.location = text;
                } else {
                    progress.innerText = "";
                    progress.style.borderBottom = 0;
                }

                btn.innerHTML = `<i class="fa-solid fa-paper-plane"></i>`;
            })
            .catch((e) => {
                console.error(e);
            });
    });
}

function handleSubmitQuestion(form) {
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        const question = e.target.question.value;
        const chat_id = e.target._chat_id.value;
        const token = e.target._token.value;
        const btn = document.getElementById("btn-submit-question");
        const messages = document.getElementById("messages");
        btn.innerHTML = components.loadingDots;
        e.target.question.value = "";

        messages.innerHTML += components.chat_user.replace(
            "{content}",
            question
        );

        const answerComponentId = getId();
        messages.innerHTML += components.chat_bot
            .replace("{content}", "")
            .replace("{id}", answerComponentId);

        const answerComponent = document.getElementById(answerComponentId);
        answerComponent.innerHTML = components.thinking;

        if (!question) return;
        const body = { question, chat_id };
        fetch("/chat", {
            headers: {
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-Token": token,
            },
            method: "POST",
            body: JSON.stringify(body),
        })
            .then(async (res) => {
                answerComponent.innerHTML = "";
                const reader = res.body.getReader();
                const decoder = new TextDecoder();

                let text = "";
                while (true) {
                    const { value, done } = await reader.read();
                    if (done) break;
                    text += decoder.decode(value, { stream: true });
                    answerComponent.innerHTML = await markdownToHtml(text);
                }

                btn.innerHTML = `<i class="fa-solid fa-paper-plane text-white"></i>`;
            })
            .catch((e) => {
                console.error(e);
            });
    });
}

const formSubmitLink = document.getElementById("form-submit-link");
if (formSubmitLink) handleSubmitIndexing(formSubmitLink);

const formQuestion = document.getElementById("form-question");
if (formQuestion) handleSubmitQuestion(formQuestion);
