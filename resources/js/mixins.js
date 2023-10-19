export default {
    methods: {
        isValidImgValue(value) {
            let string = value !== null ? value.substr(0, 11) : '';
            return string === 'data:image/';
        }
    }
};
