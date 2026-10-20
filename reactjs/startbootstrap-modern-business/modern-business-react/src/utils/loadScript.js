export function loadScript(src) {
    return new Promise((resolve, reject) => {
        const existingScript = document.querySelector(
            `script[src="${src}"]`,
        )
        if (existingScript) {
            resolve()
            return
        }
        const script = document.createElement('script')
        script.src = src
        script.async = true
        script.onload = resolve
        script.onerror = reject
        document.body.appendChild(script)
    })
}