"use client";

import { useState } from "react";
import { Card, Table, Form } from "react-bootstrap";
import Image from "next/image";
import Link from "next/link";

const ordersData = [
  {
    orderID: "#JAN-2345",
    customerImg: "/images/user-1.jpg",
    customerName: "Sarah Johnson",
    items: 120,
    created: "12 Jun 2024",
    total: "$10,490",
    vendor: "Dennis Matthews",
    status: "shipped",
  },
  {
    orderID: "#JAN-1323",
    customerImg: "/images/user-2.jpg",
    customerName: "Michael Smith",
    items: 62,
    created: "11 Jun 2024",
    total: "$6,575",
    vendor: "Kathryn Turner",
    status: "confirmed",
  },
  {
    orderID: "#DEC-1234",
    customerImg: "/images/user-3.jpg",
    customerName: "Emily Brown",
    items: 49,
    created: "10 Jun 2024",
    total: "$12,870",
    vendor: "John Valdez",
    status: "pending",
  },
  {
    orderID: "#DEC-3567",
    customerImg: "/images/user-4.jpg",
    customerName: "Jason Lee",
    items: 25,
    created: "09 Jun 2024",
    total: "$7,895",
    vendor: "Douglas Harvey",
    status: "shipped",
  },
  {
    orderID: "#DEC-1098",
    customerImg: "/images/user-5.jpg",
    customerName: "Ashley Davis",
    items: 82,
    created: "08 Jun 2024",
    total: "$4,680",
    vendor: "Susan Rader",
    status: "rejected",
  },
  {
    orderID: "#JAN-7821",
    customerImg: "/images/user-6.jpg",
    customerName: "David Wilson",
    items: 95,
    created: "07 Jun 2024",
    total: "$8,350",
    vendor: "Linda Pearson",
    status: "pending",
  },
  {
    orderID: "#JAN-6723",
    customerImg: "/images/user-7.jpg",
    customerName: "James Anderson",
    items: 30,
    created: "06 Jun 2024",
    total: "$5,230",
    vendor: "Henry Adams",
    status: "confirmed",
  },
  {
    orderID: "#DEC-4512",
    customerImg: "/images/user-8.jpg",
    customerName: "Sophia Martinez",
    items: 74,
    created: "05 Jun 2024",
    total: "$9,120",
    vendor: "Lisa Thompson",
    status: "shipped",
  },
  {
    orderID: "#DEC-9283",
    customerImg: "/images/user-9.jpg",
    customerName: "Olivia Garcia",
    items: 58,
    created: "04 Jun 2024",
    total: "$6,700",
    vendor: "Jack Stevens",
    status: "confirmed",
  },
  {
    orderID: "#DEC-3419",
    customerImg: "/images/user-10.jpg",
    customerName: "William Taylor",
    items: 29,
    created: "03 Jun 2024",
    total: "$4,290",
    vendor: "Sarah Parker",
    status: "shipped",
  },
  {
    orderID: "#JAN-4827",
    customerImg: "/images/user-11.jpg",
    customerName: "Isabella Hernandez",
    items: 60,
    created: "02 Jun 2024",
    total: "$5,650",
    vendor: "Nathan Young",
    status: "rejected",
  },
  {
    orderID: "#JAN-2714",
    customerImg: "/images/user-12.jpg",
    customerName: "Liam Robinson",
    items: 85,
    created: "01 Jun 2024",
    total: "$11,890",
    vendor: "Julia Scott",
    status: "pending",
  },
  {
    orderID: "#DEC-9921",
    customerImg: "/images/user-13.jpg",
    customerName: "Ethan Walker",
    items: 41,
    created: "31 May 2024",
    total: "$4,850",
    vendor: "Diana King",
    status: "confirmed",
  },
  {
    orderID: "#DEC-7391",
    customerImg: "/images/user-14.jpg",
    customerName: "Emma Perez",
    items: 67,
    created: "30 May 2024",
    total: "$7,630",
    vendor: "Gregory White",
    status: "shipped",
  },
  {
    orderID: "#JAN-3847",
    customerImg: "/images/user-15.jpg",
    customerName: "Benjamin Carter",
    items: 92,
    created: "29 May 2024",
    total: "$10,450",
    vendor: "Hannah Brooks",
    status: "pending",
  },
  {
    orderID: "#JAN-1283",
    customerImg: "/images/user-16.jpg",
    customerName: "Mason Adams",
    items: 45,
    created: "28 May 2024",
    total: "$5,970",
    vendor: "Charlotte Torres",
    status: "confirmed",
  },
  {
    orderID: "#DEC-4312",
    customerImg: "/images/user-17.jpg",
    customerName: "Ava Mitchell",
    items: 77,
    created: "27 May 2024",
    total: "$8,290",
    vendor: "Owen Bell",
    status: "shipped",
  },
  {
    orderID: "#DEC-2948",
    customerImg: "/images/user-18.jpg",
    customerName: "Noah Gonzalez",
    items: 53,
    created: "26 May 2024",
    total: "$6,120",
    vendor: "Sophia Ramirez",
    status: "confirmed",
  },
  {
    orderID: "#JAN-7823",
    customerImg: "/images/user-19.jpg",
    customerName: "Lucas Scott",
    items: 39,
    created: "25 May 2024",
    total: "$4,890",
    vendor: "Eleanor Campbell",
    status: "pending",
  },
  {
    orderID: "#JAN-5842",
    customerImg: "/images/user-20.jpg",
    customerName: "Mia Edwards",
    items: 64,
    created: "24 May 2024",
    total: "$7,150",
    vendor: "David Barnes",
    status: "shipped",
  },
];

const ITEMS_PER_PAGE = 10; // Adjust based on your needs

const OrdersTable = () => {
  const [searchQuery, setSearchQuery] = useState("");
  const [currentPage, setCurrentPage] = useState(1);

  // Filter orders based on search input
  const filteredOrders = ordersData.filter(
    (order) =>
      order.orderID.toLowerCase().includes(searchQuery.toLowerCase()) ||
      order.customerName.toLowerCase().includes(searchQuery.toLowerCase()) ||
      order.vendor.toLowerCase().includes(searchQuery.toLowerCase())
  );

  // Pagination Logic
  const totalPages = Math.ceil(filteredOrders.length / ITEMS_PER_PAGE);
  const currentOrders = filteredOrders.slice(
    (currentPage - 1) * ITEMS_PER_PAGE,
    currentPage * ITEMS_PER_PAGE
  );

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-lg-4 mb-3">
            <Form className="position-relative table-src-form me-0">
              <Form.Control
                type="text"
                placeholder="Search here"
                value={searchQuery}
                onChange={(e) => {
                  setSearchQuery(e.target.value);
                  setCurrentPage(1);
                }}
              />

              <span className="material-symbols-outlined position-absolute top-50 start-0 translate-middle-y">
                search
              </span>
            </Form>

            <Link
              href="#"
              className="btn btn-outline-primary py-1 px-2 px-sm-4 fs-14 fw-medium rounded-3 hover-bg"
            >
              <span className="py-sm-1 d-block">
                <i className="ri-add-line d-none d-sm-inline-block fs-18"></i>
                <span>Add New Order</span>
              </span>
            </Link>
          </div>

          <div className="default-table-area ec-recent-orders">
            <div className="table-responsive">
              <Table className="align-middle">
                <thead>
                  <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Items</th>
                    <th scope="col">Created</th>
                    <th scope="col">Total</th>
                    <th scope="col">Vendor</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>

                <tbody>
                  {currentOrders.length > 0 ? (
                    currentOrders.map((order, i) => (
                      <tr key={i}>
                        <td>{order.orderID}</td>

                        <td>
                          <div className="d-flex align-items-center">
                            <Image
                              src={order.customerImg}
                              className="wh-40 rounded-3"
                              alt="product-1"
                              width={40}
                              height={40}
                            />
                            <div className="ms-2 ps-1">
                              <h6 className="fw-medium fs-14 m-0">
                                {order.customerName}
                              </h6>
                            </div>
                          </div>
                        </td>

                        <td>{order.items}</td>

                        <td>{order.created}</td>

                        <td>{order.total}</td>

                        <td>{order.vendor}</td>

                        <td>
                          <span
                            className={`badge bg-opacity-10 p-2 fs-12 fw-normal text-capitalize ${order.status}`}
                          >
                            {order.status}
                          </span>
                        </td>

                        <td>
                          <div className="d-flex align-items-center gap-1">
                            <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                              <span className="material-symbols-outlined fs-16 text-primary">
                                visibility
                              </span>
                            </button>

                            <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                              <span className="material-symbols-outlined fs-16 text-body">
                                edit
                              </span>
                            </button>

                            <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                              <span className="material-symbols-outlined fs-16 text-danger">
                                delete
                              </span>
                            </button>
                          </div>
                        </td>
                      </tr>
                    ))
                  ) : (
                    <tr>
                      <td colSpan="8" className="text-center">
                        No orders found
                      </td>
                    </tr>
                  )}
                </tbody>
              </Table>
            </div>

            {/* Pagination */}
            {totalPages > 1 && (
              <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
                <span className="fs-13 fw-medium">
                  Showing {currentOrders.length} of {filteredOrders.length}{" "}
                  Orders
                </span>

                <div className="d-flex align-items-center">
                  <nav aria-label="Page navigation example">
                    <ul className="pagination mb-0 justify-content-center">
                      <li className="page-item">
                        <button
                          className="page-link icon"
                          onClick={() =>
                            setCurrentPage((prev) => Math.max(prev - 1, 1))
                          }
                          disabled={currentPage === 1}
                        >
                          <span className="material-symbols-outlined">
                            keyboard_arrow_left
                          </span>
                        </button>
                      </li>

                      {[...Array(totalPages)].map((_, index) => (
                        <li key={index} className="page-item">
                          <button
                            className={`page-link ${
                              currentPage === index + 1 ? "active" : ""
                            }`}
                            onClick={() => setCurrentPage(index + 1)}
                          >
                            {index + 1}
                          </button>
                        </li>
                      ))}

                      <li className="page-item">
                        <button
                          className="page-link icon"
                          onClick={() =>
                            setCurrentPage((prev) =>
                              Math.min(prev + 1, totalPages)
                            )
                          }
                          disabled={currentPage === totalPages}
                        >
                          <span className="material-symbols-outlined">
                            keyboard_arrow_right
                          </span>
                        </button>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default OrdersTable;
