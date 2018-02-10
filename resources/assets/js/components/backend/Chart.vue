<template lang="html">
    <div class="chart-container">
        <canvas id="canvas" width="300" height="300"></canvas>
    </div>
</template>

<script>
export default {
    props: {
        source: {
            type: String
        }
    },
    data () {
        return {
            chart: null
        }
    },
    mounted () {
        this.chart = new CHart
    }
}
</script>

<style lang="scss">
</style>
