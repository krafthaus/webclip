import Element from '../Element';

class BodyElement extends Element {
    /**
     * The element label.
     *
     * @type {string}
     */
    label = 'Body';

    /**
     * Determine that the current target is sortable.
     *
     * @type {boolean}
     */
    sortable = false;
}

export default BodyElement;
