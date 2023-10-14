export default () => ({
    collection: [],

    init() {
        window.axios.get('/notification/xhr').then(response => response.data).then(response => this.collection = response.data);
    },

    readAll: {
        ['@click.stop.prevent']() {
            if (!this.collection.length) {
                return;
            }
            window.axios.post('/notification/xhr-read-all').then(() => this.collection = []);
        },
    },
});
