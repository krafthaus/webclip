class Frame {
    /**
     * The canvas instance.
     *
     * @type {Canvas}
     */
    canvas;

    /**
     * The iFrame document.
     *
     * @type {Element}
     */
    document;

    /**
     * Create a new frame instance.
     * @param canvas
     */
    constructor(canvas, instance) {
        this.canvas = canvas;
        this.instance = instance;
    }

    /**
     * Get the iframe's head element.
     *
     * @returns {Element}
     */
    get head() {
        return this.document.find('head');
    }

    /**
     * Get the iframe's body element.
     *
     * @returns {Element}
     */
    get body() {
        return this.document.find('body');
    }

    /**
     * This callback is triggered when the contents of the iframe are done loading.
     * @callback Frame~onloadCallback
     */
    /**
     * @param   {Frame~onloadCallback} callback
     * @returns {Frame}
     */
    onload(callback) {
        const element = $(this.canvas.frameSelector);

        element.on('load', () => {
            this.document = element.contents();
            this.body.addClass('b-body');

            callback();
        });

        return this;
    }
}

export default Frame;
