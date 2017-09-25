import 'jquery-ui/ui/widgets/sortable';
import 'jquery-ui/ui/disable-selection';
import Frame from './Frame';
import Highlighter from './Highlighter';
import ElementCollection from './elements/Collection';

let canvasInstance = null;

class Canvas {

    /**
     * The selector to the iFrame element.
     *
     * @type {String}
     */
    frameSelector;

    /**
     * The Frame instance.
     *
     * @type {Frame}
     */
    frame;

    /**
     * The element highlighter instance.
     *
     * @type {Highlighter}
     */
    highlighter;

    /**
     * The collection of elements.
     *
     * @type {Collection}
     */
    elementCollection;

    /**
     * Create a new canvas instance.
     *
     * @param   {String} frameSelector
     * @returns {void}
     */
    constructor(frameSelector = 'iframe#canvas') {
        // Ensure that only one instance of the canvas is available at all times.
        if (!canvasInstance) {
            canvasInstance = this;
        }

        this.frameSelector = frameSelector;

        this.frame = (new Frame(this)).onload(() => {
            // After the iFrame is loaded we're able to setup all other parts
            // of the canvas like element collection and event handling.
            this.boot();
        });
    }

    /**
     * The boot method that gets run after the iFrame has been loaded.
     *
     * @returns {void}
     */
    boot() {
        this.highlighter = this.createHighlighter();
        this.elementCollection = this.bootElementCollection();
    }

    /**
     * Create a new highlighter instance.
     *
     * @returns {Highlighter}
     */
    createHighlighter() {
        const highlighter = new Highlighter(this);

        highlighter.make();

        return highlighter;
    }

    bootElementCollection() {
        const elements = this.frame.body
            .find('[class^="b-"]')
            .addBack('body');

        return new ElementCollection(this, elements);
    }

    /**
     * Get the canvas' singleton instance.
     *
     * @returns {Canvas}
     */
    static getInstance() {
        return canvasInstance;
    }
}

export default Canvas;
