<template>
    <b-alert 
    :show="dismissCountDown=10"
    dismissible
    :variant="messageType"
    @dismissed="dismissCountDown=0"
    @dismiss-count-down="countDownChanged"
    class="d-flex align-items-center flex-wrap">
        <div class="alert-content pl-3 pr-4 position-relative">
            <h5 class="mb-0 text-truncate">{{ firstMessage }}</h5>
            <p class="mb-0 text-truncate">{{ secondMessage }}.</p>
        </div>
        <div class="alert-small-box d-flex align-items-center justify-content-center text-center rounded-circle">
            <span class="d-inline-block"></span>
        </div>
    </b-alert> 
</template>
<script>
export default {
    props:['messageType' , 'firstMessage' , 'secondMessage'],
    data() {
        return {
            dismissCountDown: 0
        }
    },
    methods: {
        countDownChanged(dismissCountDown) {
            this.dismissCountDown = dismissCountDown;
        }
    }
}
</script>