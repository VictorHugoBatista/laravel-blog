export default {
    data: {
        fadeOutTime: 4000,
        fadeOutAnimationTime: 220,
    },
    elements: {
        $flashMessage: null,
    },
    initialize() {
        if (this.initializeElements()) {
            this.initializeBehavior();
        }
    },
    initializeElements() {
        const $flashMessage = $('#flash-message');
        if (! $flashMessage.length) {
            return false;
        }
        this.elements = {
            $flashMessage: $flashMessage,
        };
        return true;
    },
    initializeBehavior() {
        setTimeout(() => {
            this.elements.$flashMessage
                .fadeOut(this.data.fadeOutAnimationTime);
        }, this.data.fadeOutTime);
    },
};
