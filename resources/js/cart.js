// make available to html
window.decrement = decrement
window.increment = increment

/**
 * @param element
 */
async function decrement(element) {
    // when smaller than 1 dont handle
    const parent = element.parentElement
    const input = parent.getElementsByTagName("input")[0]
    const uiQuantity = parseInt(input.value)
    const changingQuantity = uiQuantity - 1
    if (changingQuantity < 1) {
        return
    }
    const bookid = parent.dataset.bookid
    try {
        const res = await axios.put(`http://127.0.0.1/swift-book/public/cart/${bookid}/${changingQuantity}`)
        // update UI
        input.value = changingQuantity
        refreshOrderSummary(res.data.summary)
    } catch (e) {
        console.log(e)
        const serverResponse = e.response.data
        alert(serverResponse.message)
    }
}

/**
 * @param {HTMLButtonElement} element
 */
async function increment(element) {
    const parent = element.parentElement
    const input = parent.getElementsByTagName("input")[0]
    const uiQuantity = parseInt(input.value)
    const changingQuantity = uiQuantity + 1
    const bookid = parent.dataset.bookid
    try {
        const res = await axios.put(`http://127.0.0.1/swift-book/public/cart/${bookid}/${changingQuantity}`)
        // update UI
        input.value = changingQuantity.toString()
        refreshOrderSummary(res.data.summary)
    } catch (e) {
        console.log(e)
        const serverResponse = e.response.data
        alert(serverResponse.message)
    }
}

/**
 * Called after every increment, decrement
 * @param {Array} $summary
 */
function refreshOrderSummary($summary) {
    console.log($summary)
    const div = document.getElementById('summary-body')
    const HTMLSubtotal = div.children.item(0).firstElementChild
    const HTMLShippingFee = div.children.item(1).firstElementChild
    const HTMLTotal = div.children.item(3).firstElementChild
    HTMLSubtotal.innerText = `RM ${$summary[0].toFixed(2)}`
    HTMLShippingFee.innerText = `RM ${$summary[1].toFixed(2)}`
    HTMLTotal.innerText = `RM ${$summary[2].toFixed(2)}`
}