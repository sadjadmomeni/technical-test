<template>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Inspections
            </div>
            <div class="card-body">
                <div class="list-group">
                    <a v-for="inspection in inspections" :key="inspection.id" class="list-group-item list-group-item-action" :inspection-id="inspection.id">{{inspection.inspected_at}}</a>
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
                inspections: [],
            }
        },
        mounted () {
            axios
            .get('/api/turbines/'+ this.$props.turbineId +'/inspections')
            .then(response => {
                this.$data.inspections = response.data.data
            })
        }
    }
</script>
