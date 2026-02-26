"use client";

import { Card, Form } from "react-bootstrap";

const productsData = [
  {
    id: 1,
    name: "Samsung Galaxy",
    brand: "Samsung",
    sales: "$96,455",
    icon: "smartphone",
    iconClass: "bg-primary text-primary",
  },
  {
    id: 2,
    name: "iPhone 15 Plus",
    brand: "Apple Inc.",
    sales: "$89,670",
    icon: "tap_and_play",
    iconClass: "bg-primary-div text-primary-div",
  },
  {
    id: 3,
    name: "Vivo V30",
    brand: "Vivo Ltd.",
    sales: "$75,329",
    icon: "edgesensor_low",
    iconClass: "bg-danger text-danger",
  },
  {
    id: 4,
    name: "Watch Series 7",
    brand: "Apple",
    sales: "$98,256",
    icon: "watch",
    iconClass: "bg-success text-success",
  },
  {
    id: 5,
    name: "Sony WF-SP800N",
    brand: "Sony",
    sales: "$65,987",
    icon: "headphones",
    iconClass: "bg-info text-info",
  },
];

const TopProductsBySales = () => {
  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-4">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-30">
          <h3 className="mb-0">Top Products by Sales</h3>

          <Form.Select
            className="month-select form-control p-0 h-auto border-0"
            aria-label="Default select example"
          >
            <option defaultValue="0">Select</option>
            <option defaultValue="1">Today</option>
            <option defaultValue="2">Last Weekly</option>
            <option defaultValue="3">Last Monthly</option>
            <option defaultValue="4">Last Yearly</option>
          </Form.Select>
        </div>

        <ul className="ps-0 mb-0 list-unstyled list-last-child">
          {productsData.slice(0, 5).map((product) => (
            <li
              key={product.id}
              className="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom"
            >
              <div className="d-flex align-items-center">
                <div className="flex-shrink-0">
                  <span
                    className={`material-symbols-outlined icon-circle fs-24 ${product.iconClass} bg-opacity-10 text-center rounded-1 wh-48 lh-48`}
                  >
                    {product.icon}
                  </span>
                </div>
                <div className="flex-grow-1 ms-2">
                  <h6 className="fw-medium fs-16 mb-0">{product.name}</h6>
                  <span className="fs-12">{product.brand}</span>
                </div>
              </div>
              <span className="fs-14 fw-medium text-secondary">
                {product.sales}
              </span>
            </li>
          ))}
        </ul>
      </Card.Body>
    </Card>
  );
};

export default TopProductsBySales;
