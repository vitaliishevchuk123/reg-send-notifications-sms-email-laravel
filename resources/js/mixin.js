const myMixin = {
    methods: {
        strLimit(text, maxLength) {
            if (text.length > maxLength) {
                return text.substring(0, maxLength) + '...';
            } else {
                return text;
            }
        }
    },
};

export default myMixin;
