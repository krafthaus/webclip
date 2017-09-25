import Canvas from '../Canvas';

class Element {
    /**
     * The collection instance.
     *
     * @type {Collection}
     */
    collection;

    /**
     * The element type.
     *
     * @type {String}
     */
    type;

    /**
     * The jQuery instance of the element.
     *
     * @type {jQuery}
     */
    element;

    /**
     * Determine that the current target is sortable.
     *
     * @type {boolean}
     */
    sortable = true;

    /**
     * Create a new element instance.
     *
     * @param   {Object} collection
     * @param   {String} type
     * @param   {jQuery} element
     * @returns {void}
     */
    constructor(collection, type, element) {
        this.canvas = Canvas.getInstance();
        this.collection = collection;
        this.type = type;
        this.element = element;
    }

    /**
     * Setup the element.
     *
     * @returns {void}
     */
    setup() {
        this.refreshEmptyState();
    }

    /**
     * Refresh the elements empty state.
     */
    refreshEmptyState() {
        const element = $(this.element);

        if (!$.trim(element.html())) {
            element.addClass('b-empty');
        } else {
            element.removeClass('b-empty');
        }
    }

    /**
     * Bind all nessecary events to the elemtn.
     *
     * @returns {void}
     */
    bindEvents() {
        this.bindSortable();

        $(this.element)
            .bind('mouseover', e => this.bindMouseOverHandler(e))
            .bind('click', e => this.bindLeftClickHandler(e))
            .bind('contextmenu', e => this.bindContextMenuHandler(e));
    }

    /**
     * Bind the sortable events to the element.
     *
     * @returns {void}
     */
    bindSortable() {
        // Some elements are just not sortable (e.g. body...).
        if (this.sortable === false) {
            return;
        }

        const document = this.canvas.frame.document;
        const element = $(`.b-${this.type}`, document).parent();

        // Bind the jQueryUI sortable.
        element.sortable({
            iframeFix: true,
            tolerance: 'pointer',
            connectWith: element,
            cursor: 'move',
            helper: (event, ui) => $(ui).clone().css('position', 'absolute').get(0),
            sort: () => this.onSortableSort(),
            update: () => this.onSortableUpdate(),
        }).disableSelection();
    }

    /**
     * Handle the sortable sort event.
     *
     * @returns {void}
     */
    onSortableSort() {
        this.canvas.highlighter.hide();
    }

    /**
     * Handle the sortable update event.
     *
     * @returns {void}
     */
    onSortableUpdate() {
        // Refresh the empty state of each registered element.
        this.collection.refreshEmptyStates();
    }

    /**
     * Bind the mouse over event.
     *
     * @param   {Event} e
     * @returns {void}
     */
    bindMouseOverHandler(e) {
        e.stopPropagation();

        this.canvas.highlighter
            .position(this)
            .show();
    }

    /**
     * Handle the left click event.
     *
     * @param   {Event} e
     * @returns {void}
     */
    bindLeftClickHandler(e) {
        e.stopPropagation();

        console.log('TODO: left click');
    }

    /**
     * Handle the context-menu event.
     *
     * @param   {Event} e
     * @returns {void}
     */
    bindContextMenuHandler(e) {
        e.stopPropagation();

        console.log('TODO: context menu');
    }
}

export default Element;
