"use client";

import { useState } from "react";
import { Card } from "react-bootstrap";
import Image from "next/image";

const OrderDetails = () => {
  // Initial product data
  const initialProducts = [
    {
      id: 1,
      name: "Maybelline Lash",
      price: 29,
      quantity: 1,
      image: "/images/product-45.jpg",
    },
    {
      id: 2,
      name: "Apple iPhone 16",
      price: 799,
      quantity: 1,
      image: "/images/product-46.jpg",
    },
    {
      id: 3,
      name: "Adidas Woman",
      price: 85,
      quantity: 1,
      image: "/images/product-47.jpg",
    },
  ];

  // State for products
  const [products, setProducts] = useState(initialProducts);

  // State for payment method
  const [paymentMethod, setPaymentMethod] = useState("card");

  // Handle quantity change
  const handleQuantityChange = (id, delta) => {
    setProducts((prevProducts) =>
      prevProducts.map((product) =>
        product.id === id
          ? { ...product, quantity: Math.max(1, product.quantity + delta) }
          : product
      )
    );
  };

  // Handle payment method change
  const handlePaymentMethodChange = (method) => {
    setPaymentMethod(method);
  };

  // Calculate subtotal
  const subtotal = products.reduce(
    (sum, product) => sum + product.price * product.quantity,
    0
  );

  // Calculate tax (10%)
  const tax = subtotal * 0.1;

  // Calculate total
  const total = subtotal + tax;

  return (
    <>
      <Card className="custom-shadow for-dark-rounded-bg rounded-3 border mb-4 bg-body-bg">
        <div
          className="d-flex justify-content-between align-items-center flex-wrap gap-3"
          style={{
            padding: "8.5px 25px",
          }}
        >
          <h3 className="mb-0 fs-20 fw-medium text-secondary">Order Details</h3>
          <button className="bg-transparent p-0 border-0 text-primary-50 fs-24">
            <i className="ri-refresh-line"></i>
          </button>
        </div>

        <Card.Body className="bg-white py-4 px-0 rounded-3 border-top">
          <div className="last-child-none">
            {products.map((product) => (
              <div
                key={product.id}
                className="d-flex justify-content-between align-items-center child border-bottom px-3 px-sm-4"
                style={{
                  paddingBottom: "20px",
                  marginBottom: "20px",
                }}
              >
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src={product.image}
                      className="rounded-1"
                      alt="product"
                      width={40}
                      height={28}
                    />
                  </div>
                  <div className="flex-grow-1 ms-10">
                    <h3
                      className="fs-14 fw-medium mb-0"
                      style={{ maxWidth: "78px" }}
                    >
                      {product.name}
                    </h3>
                  </div>
                </div>

                <div className="d-flex justify-content-between align-items-center">
                  <div className="product-quantity border-0 bg-body-bg rounded-2">
                    <div className="add-to-cart-counter p-0">
                      <input
                        type="button"
                        className="minusBtn bg-transparent position-relative for-dark-cart"
                        style={{
                          color: "#666666",
                          fontSize: "30px",
                          height: "30px",
                          top: "-2px",
                          width: "30px",
                        }}
                        defaultValue="-"
                        onClick={() => handleQuantityChange(product.id, -1)}
                      />
                      <input
                        type="text"
                        size="25"
                        value={product.quantity}
                        className="count bg-body-bg border-0"
                        style={{
                          maxWidth: "30px",
                          height: "30px",
                        }}
                        readOnly
                      />
                      <input
                        type="button"
                        className="plusBtn bg-transparent"
                        style={{
                          color: "#666666",
                          fontSize: "20px",
                          height: "30px",
                          width: "30px",
                        }}
                        defaultValue="+"
                        onClick={() => handleQuantityChange(product.id, 1)}
                      />
                    </div>
                  </div>

                  <span className="fs-18 fw-medium text-primary ms-2 ms-sm-4">
                    ${(product.price * product.quantity).toFixed(2)}
                  </span>
                </div>
              </div>
            ))}
          </div>

          <div className="p-4 pb-0">
            <div className="bg-body-bg p-20 rounded-3 mb-30">
              <ul className="ps-0 mb-3 list-unstyled last-child-none">
                <li
                  className="d-flex justify-content-between align-items-center"
                  style={{
                    marginBottom: "7px",
                  }}
                >
                  <span>Total</span>
                  <span>{products.length} Items</span>
                </li>
                <li
                  className="d-flex justify-content-between align-items-center"
                  style={{
                    marginBottom: "7px",
                  }}
                >
                  <span className="text-secondary fw-medium">Subtotal:</span>
                  <span className="text-secondary fw-medium">
                    ${subtotal.toFixed(2)}
                  </span>
                </li>
                <li
                  className="d-flex justify-content-between align-items-center"
                  style={{
                    marginBottom: "7px",
                  }}
                >
                  <span className="text-secondary fw-medium">Shipping:</span>
                  <span className="text-secondary fw-medium">$0.00</span>
                </li>
                <li
                  className="d-flex justify-content-between align-items-center"
                  style={{
                    marginBottom: "7px",
                  }}
                >
                  <span className="text-secondary fw-medium">Tax (10%):</span>
                  <span className="text-secondary fw-medium">
                    ${tax.toFixed(2)}
                  </span>
                </li>
              </ul>

              <div className="d-flex justify-content-between align-items-center">
                <h3 className="fs-20 fw-medium mb-0">Payable Total</h3>
                <h3 className="fs-20 fw-medium mb-0">${total.toFixed(2)}</h3>
              </div>
            </div>

            <h3 className="fs-20 fw-medium mb-3">Payment Method</h3>

            <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center payment-method mb-30">
              {["cash", "card", "e-wallet"].map((method) => (
                <div key={method}>
                  <input
                    type="radio"
                    className="btn-check"
                    name="options-base"
                    id={method}
                    autoComplete="off"
                    checked={paymentMethod === method}
                    onChange={() => handlePaymentMethodChange(method)}
                  />
                  <label
                    className="btn bg-f6f7f9"
                    htmlFor={method}
                    style={{
                      width: "81px",
                      height: "66px", 
                      border: "1px solid #DDE4FF",
                      padding: "9px 0",
                    }} 
                  >
                    <Image
                      src={`/images/${method}.svg`}
                      alt={method}
                      width={27}
                      height={26}
                    />
                    <span className="d-block text-black">
                      {method === "e-wallet"
                        ? "E-Wallet"
                        : method.charAt(0).toUpperCase() + method.slice(1)}
                    </span>
                  </label>
                </div>
              ))}
            </div>

            <button
              type="button"
              className="btn btn-primary fs-16 fw-medium w-100 py-2"
            >
              Place Order
            </button>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default OrderDetails;
