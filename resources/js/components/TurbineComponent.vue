<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Turbines
                    </div>
                    <div class="card-body">
                        <div id="turbine-list" class="list-group">
                            <a v-for="turbine in turbines" :key="turbine.id"
                                :class="{ 'active': this.$data.selectedTurbineId == turbine.id }"
                                class="list-group-item list-group-item-action" :turbine-id="turbine.id"
                                v-on:click="select(turbine.id)">{{ turbine.name }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <turbine-inspection-component :key="componentKey"
                :turbineId=this.$data.selectedTurbineId></turbine-inspection-component>
        </div>
        <br>
        <div class="row justify-content-center">
            <turbine-component-component :key="componentKey"
                :turbineId=this.$data.selectedTurbineId></turbine-component-component>
        </div>
    </div>
</template>

<script>
export default {
    props: ['farm'],
    data() {
        return {
            turbines: [],
            componentKey: []
        }
    },
    mounted() {
        axios
            .get('/api/farms/' + this.$props.farm.id + '/turbines')
            .then(response => {
                this.$data.turbines = response.data.data
            })
    },
    methods: {
        select: function (id) {
            this.$data.selectedTurbineId = id;
            this.$data.componentKey += 1;
        }
    }
}
</script>
