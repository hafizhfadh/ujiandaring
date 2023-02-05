// Move "per page dropdown" selector element out of label
// to make it work with bootstrap 5. Add bs5 classes.
function adaptPageDropdown(dataTable) {
    const selector = dataTable.wrapper.querySelector(".dataTable-selector")
    selector.parentNode.parentNode.insertBefore(selector, selector.parentNode)
    selector.classList.add("form-select")
}

// Add bs5 classes to pagination elements
function adaptPagination(dataTable) {
    const paginations = dataTable.wrapper.querySelectorAll(
        "ul.dataTable-pagination-list"
    )

    for (const pagination of paginations) {
        pagination.classList.add(...["pagination", "pagination-primary"])
    }

    const paginationLis = dataTable.wrapper.querySelectorAll(
        "ul.dataTable-pagination-list li"
    )

    for (const paginationLi of paginationLis) {
        paginationLi.classList.add("page-item")
    }

    const paginationLinks = dataTable.wrapper.querySelectorAll(
        "ul.dataTable-pagination-list li a"
    )

    for (const paginationLink of paginationLinks) {
        paginationLink.classList.add("page-link")
    }
}

function convertObject(dataObject) {
    if (dataObject.length === 0) return {
        headings: [],
        data: []
    };

    let obj = {
        // Quickly get the headings
        headings: Object.keys(dataObject[0]).map((header, index) => {
            header.toUpperCase();
            header.replace('_', ' ');
            return header;
        }),

        // data array
        data: []
    };

    const len = dataObject.length;
    // Loop over the objects to get the values
    for (let i = 0; i < len; i++) {
        obj.data[i] = [];

        for (let p in dataObject[i]) {
            if (dataObject[i].hasOwnProperty(p)) {
                obj.data[i].push(dataObject[i][p]);
            }
        }
    }

    return obj
};
