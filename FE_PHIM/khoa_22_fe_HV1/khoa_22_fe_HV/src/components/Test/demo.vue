<template>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>RefNo</th>
                <th>creditAmount</th>
                <th>description</th>
            </tr>
        </thead>
        <tbody>
            <template v-for="(value, index) in list_giao_dich" :key="index">
                <tr>
                    <td>{{ value.refNo }}</td>
                    <td>{{ value.creditAmount }}</td>
                    <td>{{ value.description }}</td>
                </tr>
            </template>
        </tbody>
    </table>
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            list_giao_dich: [],
        }
    },
    mounted() {
        this.loadgiaodich();
    },
    methods: {
        loadgiaodich() {
            const payload = {
                "USERNAME": "0355254063",
                "PASSWORD": "Dinh3112003@",
                "DAY_BEGIN": "08/07/2025",
                "DAY_END": "10/07/2025",
                "NUMBER_MB": "0355254063"
            };
            axios.post('https://api-mb.dzmid.io.vn/api/transactions', payload)
                .then((res) => {
                    this.list_giao_dich = res.data.data.transactionHistoryList;
                })
        }
    },
}
</script>
<style></style>