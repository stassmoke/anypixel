class CatalogFilter {

    constructor() {
        this.baseUrl = window.location.origin + window.location.pathname;

        this.filter = {
            orderBy: null,
            term: null,
        };

        this.addEvents();
    }

    addEvents() {
        let self = this;

        let sortButtons = document.querySelectorAll('.catalog-sort-filter');

        for (let sortButton of sortButtons) {
            sortButton.addEventListener('click', function () {
                let sortBy = this.getAttribute('data-sort');

                if (sortBy !== self.filter.orderBy) {
                    self.filter.orderBy = sortBy;
                    self.submitFilter();
                }
            });
        }
    }

    submitFilter() {
        let filterParts = [];

        for (let filterKey of Object.keys(this.filter)) {
            if (CatalogFilter.checkValidFilter(this.filter[filterKey])) {
                filterParts.push(`${filterKey}=${this.filter[filterKey]}`);
            }
        }

        let url = this.baseUrl;

        if (filterParts.length > 0) {
            url += '?' + filterParts.join('&');
        }

        document.location.href = url;
    }

    setFilters(filtersJson) {
        let filters = JSON.parse(filtersJson);

        for (let filterKey of Object.keys(filters)) {
            if (this.filter.hasOwnProperty(filterKey) && CatalogFilter.checkValidFilter(filters[filterKey])) {
                this.filter[filterKey] = filters[filterKey];
            }
        }
    }

    static checkValidFilter(value) {
        try {
            return !(value === null || value === undefined || value.length === 0);
        } catch (e) {
            return false;
        }
    }
}
