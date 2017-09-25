class Highlighter {
    /**
     * The canvas instance.
     *
     * @type {Canvas}
     */
    canvas;

    /**
     * Create a new highlighter instance.
     *
     * @param   {Canvas}  canvas
     * @returns {void}
     */
    constructor(canvas) {
        this.canvas = canvas;
    }

    /**
     * Create a new highlighter element.
     *
     * @returns {void}
     */
    make() {
        const element = $(`
            <div id="__b-highlighter">
                <span class="__b-element-label"></span>
            </div>
        `);

        this.element = element;
        this.canvas.frame.body.append(element);
    }

    /**
     * Position the highlighter element around the given element.
     *
     * @param   {jQuery}  element
     * @returns {Highlighter}
     */
    position(element) {
        const rect = element.element.getBoundingClientRect();
        const label = this.element.find('span.__b-element-label');

        // Position the label on the inside of the highlighter element
        // when the highlighter is positioned at or near the top.
        label.css({ top: (rect.top < 20) ? 0 : -21 })
             .text(element.label);

        // console.log(this.canvas.frame.body.find('#__b-highlighter'));

        this.element.css({
            top: rect.top,
            left: rect.left,
            width: rect.width,
            height: rect.height,
        });

        return this;
    }

    /**
     * Hide the highlighter element.
     *
     * @returns {void}
     */
    show() {
        this.element.show();
    }

    /**
     * Show the highlighter element.
     *
     * @returns {void}
     */
    hide() {
        this.element.hide();
    }
}

export default Highlighter;
