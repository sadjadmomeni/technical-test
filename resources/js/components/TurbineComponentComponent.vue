<template>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Components
            </div>
            <div class="card-body">
                <div class="list-group">
                    <a v-for="component in components" :key="component.id" class="list-group-item list-group-item-action" :component-id="component.id">{{component.name}} - {{component.component_type.name}} - {{component.latest_grade[0].grade_type.name}}</a>
                </div>
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
