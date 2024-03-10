<template>
    <div class="layout-spacing" v-if="loaded">
        <div class="row mt-3" style="display: flex; row-gap: 20px;">
            <div class="col-md-4 rounded">
                <div class="card" style="border-radius: 8px">
                    <div
                        class="card-body d-flex align-items-center"
                        style="
                            height: 100vh;
                            max-height: 143px;
                            column-gap: 20px;

                        "
                    >
                        <div>
                            <div class="w-icon" style="background: #f2e477;border-radius: 60px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
                            </div>
                        </div>
                        <div class="icons-content">
                            <h6 class="mb-1 card-title">Total Author</h6>
                            <span>1004</span> <br />
                            <span class="text-sm">
                                View all
                            </span>
                        </div>

                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 rounded ">
                <div class="card" style="border-radius: 8px">
                    <!-- <img class="card-img-top" src="" alt="Card image cap" /> -->
                    <div
                        class="card-body d-flex align-items-center"
                        style="
                            height: 100vh;
                            max-height: 143px;
                            column-gap: 20px;
                        "
                    >

                            <div class="w-icon" style="background: #f2e477;border-radius: 60px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
                            </div>

                        <div class="icons-content">
                            <h6 class="mb-1 card-title">Total Publication</h6>
                            <span>994</span> <br />
                            <span class="text-sm">
                               View all
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 rounded ">
                <div class="card" style="border-radius: 8px">
                    <!-- <img class="card-img-top" src="" alt="Card image cap" /> -->
                    <div
                        class="card-body d-flex align-items-center"
                        style="
                            height: 100vh;
                            max-height: 143px;
                            column-gap: 20px;
                        "
                    >
                        <div>

                            <div class="w-icon" style="background: #f2e477;border-radius: 60px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
                            </div>

                        </div>
                        <div class="icons-content">
                            <h6 class="mb-1 card-title">Total Jury</h6>
                            <span>487</span> <br />
                            <span class="text-sm">
                                View all
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="widget widget-table-two">
                <div class="widget-heading">
                    <h5 class="">Deals Statistics</h5>
                </div>

                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><div class="th-content">PostID</div></th>
                                    <th><div class="th-content">Employee</div></th>
                                    <th><div class="th-content">Post Title</div></th>
                                    <th>
                                        <div class="th-content">CreatedAt</div>
                                    </th>
                                    <th><div class="th-content">Status</div></th>
                                </tr>
                            </thead>
                            <tbody v-if="orders && orders.length > 0">
                                <template v-for="order in orders" :key="order.id">
                                    <tr>
                                        <td>{{ order.id }}</td>
                                        <td>
                                            {{ order.user_shipping_info.last_name }}
                                        </td>
                                        <td>post title here</td>
                                        <td class="text-center">
                                            {{  dateToString(order.created_at) }}
                                        </td>
                                        <td>
                                            Pending
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
import mixer from '../mixer';
export default {
    mixins:[mixer],
    components: {

    },

    data() {
        return {
            loaded: true,
            orders: [],
            order_info: {
                ttl: 0,
                pending: 0,
                processing: 0,
                delivered: 0,
            },
            status_info: {
                active: 0,
                cancel: 0,
                onhold: 0,
            },
        };
    },

    methods: {
        getOrder() {
            axios
                .get(baseUrl + `get-order?no_paginate=yes&take_some=10`)
                .then((result) => {
                    this.orders = result.data;
                })
                .catch((errors) => {
                    console.log(errors);
                });
        },

        getOrderInfo() {
            axios
                .get(baseUrl + `get-order-info`)
                .then((result) => {
                    result.data.countdata.map((item, i) => {
                        switch (item.order_position) {
                            case "0":
                                this.order_info.ttl = 1004;
                                break;
                            case "1":
                                this.order_info.pending = 958;
                                break;
                            case "2":
                                this.order_info.processing = 672;
                                break;
                            case "3":
                                this.order_info.delivered = 557;
                                break;
                        }
                    });
                    result.data.orStatus.map((item, i) => {
                        switch (item.status) {
                            case "0":
                                this.status_info.cancel = item.order_status;
                                break;
                            case "1":
                                this.status_info.active = item.order_status;
                                break;
                            case "2":
                                this.status_info.onhold = item.order_status;
                                break;
                        }
                    });
                })
                .catch((errors) => {
                    console.log(errors);
                });
        },
    },

    mounted() {
        this.getOrder();
        this.getOrderInfo();
    },
};
</script>

<style>
.gdar {
    background: linear-gradient(
        linear-gradient(140deg, #6e85b1 0 34%, #d9dce0 -40% 51%)
    ) !important;
}
</style>
