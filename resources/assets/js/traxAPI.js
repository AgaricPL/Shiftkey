

    // Mock endpoints to be changed with actual REST API implementation
let traxAPI = {
    getCarsEndpoint() {
        return '/api/car'
    },
    getCarEndpoint(id) {
        return '/api/car' + '/' + id;
    },
    addCarEndpoint() {
        return '/api/car/create';
    },
    deleteCarEndpoint(id) {
        return '/api/car' + '/' + id;
    },
    getTripsEndpoint() {
        return '/api/mock-get-trips';
    },
    addTripEndpoint() {
        return 'api/mock-add-trip'
    }
}



export { traxAPI };
