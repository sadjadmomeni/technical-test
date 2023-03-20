<template>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Components
            </div>
            <div class="card-body">
                <div v-if="components.length == 0">
                Please select a Turbine to see list of Components.
                </div>
                <table v-if="components.length > 0" class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Name</th>
                            <th scope="col">Current Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="component in components" :key="component.id">
                            <th scope="col">{{component.component_type.name}}</th>
                            <th scope="col">{{component.name}}</th>
                            <th scope="col">{{component.latest_grade[0].grade_type.name}}</th>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
       
</template>

<script>
    export default {
        props: ['turbineId'],
        data() {
            return {
                components: [],
            }
        },
        mounted () {
            axios
            .get('/api/turbines/'+ this.$props.turbineId +'/components')
            .then(response => {
                this.$data.components = response.data.data
            })
        }
    }
</script>
