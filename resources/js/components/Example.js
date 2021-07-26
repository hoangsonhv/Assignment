
import React from 'react';
import ReactDOM from 'react-dom';
import axios from "axios";
class Example extends React.Component{
    constructor() {
        super();
        this.state = {
            cart:[],
            cities:[],
            customer:{
                customer_name:"",
                customer_tel:"",
                customer_address:"",
                city:""
            },
            shippingFee:0,
            grandTotal:0,
            selectValue: ""
        }
        this.handleDropdownChange = this.handleDropdownChange.bind(this);
    }

    handleDropdownChange(e) {
        this.setState({ selectValue: e.target.value });
    }
    componentDidMount() {
        axios.get("/cart-api").then(rs=>{
            console.log(rs);
            this.setState({
                cart: rs.data.cart
            })
        });
        axios.get("/city-api").then(rs=>{
            console.log(rs);
            this.setState({
                cities: rs.data.city
            })
        });

    }
    getInput(e){
        var customer = this.state.customer;
        customer[e.target.name]= e.target.value;
        this.setState({
           customer: customer
        })
    }
    render() {
        let GrandTotal= 0;
        let Ship= 0;
        const cart = this.state.cart;
        const cities = this.state.cities;
        function Shipper(pre) {
            cities.map(function (e) {
                if (pre ==e.city){

                    return Ship = e.lat*1000
                }
            })
            console.log(Ship)
            return  Ship;
        }
        console.log(this.state.customer)
        return (
            <div className="content-wrapper">
                <section className="content-header">
                    <div className="container-fluid">
                        <div className="row mb-2">
                            <div className="col-sm-6">
                                <h1>Danh sách sản phẩm</h1>
                            </div>
                            <div className="col-sm-6">
                                <ol className="breadcrumb float-sm-right">
                                    <li className="breadcrumb-item"><a href="/">Home</a></li>
                                    <li className="breadcrumb-item active">Danh sách sản phẩm</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                <section className="content">
                    <div className="container-fluid">
                        <div className="card">
                            <div className="card-header">
                                <h3 className="card-title">Đặt hàng</h3>

                            </div>
                            <div className="card-body table-responsive p-0">
                                <form action="checkout" method="post">
                                    <div className="row">
                                        <div className="col-md-6">
                                            <div className="form-group">
                                                <label>Customer Name</label>
                                                <input type="text" name="customer_name" value={this.state.customer.name} onChange={this.getInput.bind(this)} className="form-control"/>
                                            </div>
                                            <div className="form-group">
                                                <label>Customer Tel</label>
                                                <input type="tel" name="customer_tel" value={this.state.customer.tel} onChange={this.getInput.bind(this)} className="form-control"/>
                                            </div>
                                            <div className="form-group">
                                                <label>Customer Address</label>
                                                <textarea className="form-control" onChange={this.getInput.bind(this)} name="customer_address">
                                                    {this.state.customer.address}
                                                </textarea>
                                            </div>
                                            <div className="form-group">
                                                <label>City</label>
                                                <select className="form-control" required onChange={this.handleDropdownChange} name="customer_city">
                                                    <option selected  disabled>Hãy chọn thành phố</option>
                                                    {
                                                        cities.map( function (e,k){
                                                            return(
                                                                <option key={k}  value={e.city}>
                                                                    {e.city}
                                                                </option>
                                                            )
                                                        })
                                                    }
                                                </select>
                                                {this.state.selectValue}
                                            </div>
                                        </div>
                                        <div className="col-md-6">
                                            <table className="table">
                                                <thead>
                                                <tr>
                                                    <td>Image</td>
                                                    <td>Name</td>
                                                    <td>Price</td>
                                                    <td>Qty</td>
                                                    <td>Total</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                {
                                                    cart.map(function (e,k) {
                                                        var total = e.price * e.cart_qty;

                                                        GrandTotal+= total;
                                                        return (

                                                            <tr key={k}>
                                                                <td>
                                                                    <img style={{ maxWidth: 100 }} src={GetImg(e.image)}/>
                                                                    {/*{GetImg(e.image)}*/}
                                                                </td>
                                                                <td>
                                                                    {e.name}
                                                                </td>
                                                                <td>
                                                                    {e.price}
                                                                </td>
                                                                <td>
                                                                    {e.cart_qty}
                                                                </td>
                                                                <td>
                                                                    {total}
                                                                </td>
                                                            </tr>
                                                        )
                                                    }
                                                )}
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td colSpan="4">Ship</td>
                                                    <td>{
                                                        Shipper(this.state.selectValue)
                                                    }</td>
                                                </tr>
                                                <tr>
                                                    <td colSpan="4">Grand Total</td>
                                                    <td>{
                                                        GrandTotal+Ship
                                                    }</td>
                                                </tr>
                                                <tr>
                                                    <td colSpan="5">

                                                        <div className="form-group">
                                                            <button className="btn btn-outline-primary"
                                                                    type="submit">Place order
                                                            </button>
                                                        </div>

                                                    </td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        );
    }
}

function GetImg(img){
    if (img!=null){
        let a = "upload/"+img+""
        return a;
    }
     return "upload/noimg.jpg"
}
export default Example;

if (document.getElementById('checkout')) {
    ReactDOM.render(<Example />, document.getElementById('checkout'));
}
