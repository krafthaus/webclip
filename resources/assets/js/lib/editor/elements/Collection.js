import Serializer from './Serializer';
import ButtonElement from './basic/ButtonElement';
import DivElement from './basic/DivElement';
import ListElement from './basic/ListElement';
import LinkElement from './basic/LinkElement';
import ListItemElement from './basic/ListItemElement';
import CheckboxElement from './form/CheckboxElement';
import FormElement from './form/FormElement';
import InputElement from './form/InputElement';
import LabelElement from './form/LabelElement';
import RadioElement from './form/RadioElement';
import SelectElement from './form/SelectElement';
import TextareaElement from './form/TextareaElement';
import BodyElement from './layout/BodyElement';
import ColumnElement from './layout/ColumnElement';
import RowElement from './layout/RowElement';
import SectionElement from './layout/SectionElement';
import ImageElement from './media/ImageElement';
import VideoElement from './media/VideoElement';
import HeadingElement from './typography/HeadingElement';
import ParagraphElement from './typography/ParagraphElement';

class Collection {
    /**
     * The canvas instance.
     *
     * @type {Canvas}
     */
    canvas;

    /**
     * The collection of elements.
     *
     * @type {Array}
     */
    elements = [];

    /**
     * All available element types.
     *
     * @type {Object}
     */
    types = {
        button: ButtonElement,
        div: DivElement,
        link: LinkElement,
        list: ListElement,
        'list-item': ListItemElement,
        checkbox: CheckboxElement,
        form: FormElement,
        input: InputElement,
        label: LabelElement,
        radio: RadioElement,
        select: SelectElement,
        textarea: TextareaElement,
        body: BodyElement,
        col: ColumnElement,
        row: RowElement,
        section: SectionElement,
        image: ImageElement,
        video: VideoElement,
        heading: HeadingElement,
        paragraph: ParagraphElement,
    };

    /**
     * Create a new element collection instance.
     *
     * @param   {Canvas} canvas
     * @param   {Array} elements
     * @returns {void}
     */
    constructor(canvas, elements) {
        this.canvas = canvas;
        this.elements = elements;

        this.collect();
    }

    /**
     * Collect and boot every element in this collection.
     *
     * @returns {void}
     */
    collect() {
        let type;
        let instance;

        // Collect each element.
        this.elements.each((key, element) => {
            type = Collection.getTypeOfElement(element);
            instance = this.types[type];

            if (instance === undefined) {
                throw Error(`Undefined element type: ${type}.`);
            }

            instance = new this.types[type](this, type, element);
            instance.setup();
            instance.bindEvents();

            this.elements[key] = instance;
        });

        setTimeout(() => this.serialize(), 1000);
    }

    /**
     * Recollect each element.
     *
     * @returns {void}
     */
    recollect() {
        // When we recall the collect method, we need to make sure
        // we're collection each element from a clean slate.
        this.elements = [];

        this.collect();
    }

    serialize() {
        Serializer.serialize(
            this.canvas.frame.body,
        );
    }

    /**
     * Refresh the empty state of each registered element.
     *
     * @returns {void}
     */
    refreshEmptyStates() {
        this.elements.each((key, element) => {
            element.refreshEmptyState();
        });
    }

    /**
     * Get the type of the element.
     *
     * @param   {jQuery} element
     * @returns string
     */
    static getTypeOfElement(element) {
        return element.className
            .split(/\s+/)
            .find(el => el.startsWith('b-'))
            .replace('b-', '');
    }
}

export default Collection;
