export default function (Vue) {
    let editor
    Vue.editor = {
        setCKeditor(editor) {
            editor =  editor
        },
        getCKeditor() {
            return "Oeoes"
        }
    }

    Object.defineProperties(Vue.prototype, {
        $editor: {
            get: () => {
                return Vue.editor
            }
        }
    })
}