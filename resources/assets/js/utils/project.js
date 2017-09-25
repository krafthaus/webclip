/* eslint-disable import/prefer-default-export */

export const project = {
    remember(uuid) {
        localStorage.setItem('project', uuid);
    },

    /**
     * Get the current registered project.
     *
     * @returns
     */
    getCurrent() {
        return localStorage.getItem('project');
    },
};
