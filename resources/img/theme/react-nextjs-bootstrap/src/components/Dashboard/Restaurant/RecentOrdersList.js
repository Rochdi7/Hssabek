"use client";

import React, { useEffect, useState } from "react";
import Image from "next/image";
import { Card, Table, Dropdown } from "react-bootstrap";

const RecentOrdersList = () => {
  const [orders, setOrders] = useState([]);
  const [currentPage, setCurrentPage] = useState(1);
  const [itemsPerPage] = useState(5); // Number of items per page

  useEffect(() => {
    // Simulate API call
    const mockOrders = [
      // Add more mock data to test pagination
      {
        code: "#001",
        item: "Fish Cutlet",
        image: "/images/order-1.jpg",
        quantity: 5,
        customer: "Johnna Loren",
        location: "Washington, D.C.",
        deliveryTime: "10:05 AM",
        price: 35.75,
        status: "Delivered",
      },
      {
        code: "#002",
        item: "Pea Creamy Soup",
        image: "/images/order-2.jpg",
        quantity: 1,
        customer: "Skyler White",
        location: "Los Angeles, CA",
        deliveryTime: "11:15 AM",
        price: 24.3,
        status: "Processing",
      },
      {
        code: "#003",
        item: "Macaroon 02",
        image: "/images/order-3.jpg",
        quantity: 2,
        customer: "Jonathon Watson",
        location: "New York",
        deliveryTime: "11:30 AM",
        price: 21.15,
        status: "Cancelled",
      },
      {
        code: "#004",
        item: "Healthy Salad Bowl",
        image: "/images/order-4.jpg",
        quantity: 1,
        customer: "Walter White",
        location: "San Jose, CA",
        deliveryTime: "11:52 AM",
        price: 12.2,
        status: "Delivered",
      },
      {
        code: "#005",
        item: "Pizza",
        image: "/images/order-5.jpg",
        quantity: 3,
        customer: "Alice Johnson",
        location: "Chicago, IL",
        deliveryTime: "12:15 PM",
        price: 45.0,
        status: "Delivered",
      },
      {
        code: "#006",
        item: "Burger",
        image: "/images/order-1.jpg",
        quantity: 2,
        customer: "Bob Smith",
        location: "Houston, TX",
        deliveryTime: "12:30 PM",
        price: 18.5,
        status: "Processing",
      },
      {
        code: "#007",
        item: "Sushi",
        image: "/images/order-2.jpg",
        quantity: 4,
        customer: "Charlie Brown",
        location: "Phoenix, AZ",
        deliveryTime: "12:45 PM",
        price: 32.0,
        status: "Cancelled",
      },
      {
        code: "#008",
        item: "Pasta",
        image: "/images/order-3.jpg",
        quantity: 1,
        customer: "Diana Prince",
        location: "Philadelphia, PA",
        deliveryTime: "01:00 PM",
        price: 22.75,
        status: "Delivered",
      },
      {
        code: "#009",
        item: "Salad",
        image: "/images/order-4.jpg",
        quantity: 2,
        customer: "Eve Adams",
        location: "San Antonio, TX",
        deliveryTime: "01:15 PM",
        price: 15.0,
        status: "Processing",
      },
      {
        code: "#010",
        item: "Steak",
        image: "/images/order-5.jpg",
        quantity: 1,
        customer: "Frank Castle",
        location: "San Diego, CA",
        deliveryTime: "01:30 PM",
        price: 50.0,
        status: "Delivered",
      },
    ];

    setOrders(mockOrders);
  }, []);

  // Calculate pagination
  const indexOfLastItem = currentPage * itemsPerPage;
  const indexOfFirstItem = indexOfLastItem - itemsPerPage;
  const currentItems = orders.slice(indexOfFirstItem, indexOfLastItem);
  const totalPages = Math.ceil(orders.length / itemsPerPage);

  const handlePageChange = (pageNumber) => {
    setCurrentPage(pageNumber);
  };

  const handleNext = () => {
    if (currentPage < totalPages) {
      setCurrentPage(currentPage + 1);
    }
  };

  const handlePrevious = () => {
    if (currentPage > 1) {
      setCurrentPage(currentPage - 1);
    }
  };

  const getStatusStyle = (status) => {
    switch (status) {
      case "Delivered":
        return { backgroundColor: "#D8FFC8", color: "#25b003" };
      case "Processing":
        return { backgroundColor: "#EEF6FF", color: "#3584fc" };
      case "Cancelled":
        return { backgroundColor: "#FFE8D4", color: "#EE3E08" };
      default:
        return { backgroundColor: "#EEE", color: "#666" };
    }
  };

  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-4">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3">
          <h3 className="mb-0 text-secondary-50">Recent Order List</h3>

          <Dropdown className="dropdown select-dropdown">
            <Dropdown.Toggle
              variant="secondary"
              id="dropdown-basic"
              className="dropdown-toggle bg-border-color border text-body rounded-2"
            >
              Monthly
            </Dropdown.Toggle>

            <Dropdown.Menu className="bg-white border box-shadow">
              <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                Weekly
              </Dropdown.Item>

              <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                Monthly
              </Dropdown.Item>

              <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                Yearly
              </Dropdown.Item>
            </Dropdown.Menu>
          </Dropdown>
        </div>

        <div className="default-table-area style-two campaigns-table recent-order-list-table">
          <div className="table-responsive">
            <Table className="align-middle border-0">
              <thead>
                <tr className="border-bottom">
                  <th className="bg-transparent text-body fw-medium">
                    <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                      CODE
                    </span>
                  </th>
                  <th className="bg-transparent text-body fw-medium">
                    <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                      ITEM
                    </span>
                  </th>
                  <th className="bg-transparent text-body fw-medium">
                    <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                      QUANTITY
                    </span>
                  </th>
                  <th className="bg-transparent text-body fw-medium">
                    <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                      CUSTOMER
                    </span>
                  </th>
                  <th className="bg-transparent text-body fw-medium">
                    <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                      LOCATION
                    </span>
                  </th>
                  <th className="bg-transparent text-body fw-medium">
                    <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                      DELIVERY TIME
                    </span>
                  </th>
                  <th className="bg-transparent text-body fw-medium">
                    <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                      PRICE
                    </span>
                  </th>
                  <th className="bg-transparent text-body fw-medium">
                    <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                      STATUS
                    </span>
                  </th>
                  <th className="text-end bg-transparent text-body fw-medium">
                    <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                      ACTION
                    </span>
                  </th>
                </tr>
              </thead>
              <tbody>
                {currentItems.map((order) => (
                  <tr key={order.code}>
                    <td className="fs-12 fw-semibold text-body-color-50">
                      {order.code}
                    </td>
                    <td>
                      <div className="d-flex align-items-center">
                        <div className="flex-shrink-0">
                          <Image
                            src={order.image}
                            className="rounded-circle"
                            alt="order"
                            width={30}
                            height={30}
                          />
                        </div>
                        <div className="flex-grow-1 ms-2">
                          <h4 className="fs-14 fw-semibold mb-0 text-secondary-50">
                            {order.item}
                          </h4>
                        </div>
                      </div>
                    </td>
                    <td className="fs-12 fw-semibold text-body-color-50">
                      {order.quantity}
                    </td>
                    <td className="fs-12 fw-semibold text-body-color-50">
                      {order.customer}
                    </td>
                    <td className="fs-12 fw-semibold text-body-color-50">
                      {order.location}
                    </td>
                    <td className="fs-12 fw-semibold text-body-color-50">
                      {order.deliveryTime}
                    </td>
                    <td className="fs-12 fw-semibold text-body-color-50">
                      $ {order.price.toFixed(2)}
                    </td>
                    <td>
                      <span
                        className="d-inline-block rounded-pill fs-12 fw-medium"
                        style={{
                          ...getStatusStyle(order.status),
                          padding: "4px 10px",
                          lineHeight: 1,
                        }}
                      >
                        {order.status}
                      </span>
                    </td>
                    <td className="text-end">
                      <div className="d-flex justify-content-end align-items-center gap-1">
                        <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                          <i className="material-symbols-outlined fs-16 text-primary">
                            visibility
                          </i>
                        </button>
                        <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                          <i className="material-symbols-outlined fs-16 text-primary-div-50">
                            edit
                          </i>
                        </button>
                        <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                          <i className="material-symbols-outlined fs-16 text-danger">
                            delete
                          </i>
                        </button>
                      </div>
                    </td>
                  </tr>
                ))}
              </tbody>
            </Table>
          </div>

          <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap mt-4">
            <span className="fs-12 fw-medium">
              Showing {indexOfFirstItem + 1} to{" "}
              {Math.min(indexOfLastItem, orders.length)} of {orders.length}{" "}
              Results
            </span>

            <nav aria-label="Page navigation example">
              <ul className="pagination mb-0 justify-content-center">
                <li className="page-item">
                  <button
                    onClick={handlePrevious}
                    className="page-link icon hover-bg"
                    disabled={currentPage === 1}
                  >
                    <i className="material-symbols-outlined">
                      keyboard_arrow_left
                    </i>
                  </button>
                </li>
                {Array.from({ length: totalPages }, (_, i) => i + 1).map(
                  (page) => (
                    <li key={page} className="page-item">
                      <button
                        onClick={() => handlePageChange(page)}
                        className={`page-link ${
                          currentPage === page ? "active" : ""
                        }`}
                      >
                        {page}
                      </button>
                    </li>
                  )
                )}
                <li className="page-item">
                  <button
                    onClick={handleNext}
                    className="page-link icon hover-bg"
                    disabled={currentPage === totalPages}
                  >
                    <i className="material-symbols-outlined">
                      keyboard_arrow_right
                    </i>
                  </button>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </Card.Body>
    </Card>
  );
};

export default RecentOrdersList;
