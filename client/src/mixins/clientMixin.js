import PreloaderComponent from "@/components/preloader/PreloaderComponent.vue";

export default {
    data() {
        return {
            loading: true
        }
    },
    created() {
        this.getContent().finally(() => {
            this.loading = false
        });
    },
    components: {
        PreloaderComponent
    }
}