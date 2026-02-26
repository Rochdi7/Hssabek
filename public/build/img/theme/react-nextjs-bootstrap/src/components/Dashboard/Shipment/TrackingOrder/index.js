"use client";

import { useState } from "react";
import { Card, Button, Table, Form } from "react-bootstrap";

const TrackingOrder = () => {
  const [currentPage, setCurrentPage] = useState(1);
  const [timeFilter, setTimeFilter] = useState("0");
  const [selectedRows, setSelectedRows] = useState([]);
  const itemsPerPage = 5;

  const orderData = [
    {
      id: "#OR045",
      customer: "Mark Blake",
      date: "2024-09-05",
      location: "Chicago, IL",
      tracking: "TRK001",
      status: "Delivered",
    },
    {
      id: "#OR085",
      customer: "Cheryl Myers",
      date: "2024-09-06",
      location: "London, UK",
      tracking: "TRK002",
      status: "In Transit",
    },
    {
      id: "#OR099",
      customer: "Marc Bradley",
      date: "2024-09-10",
      location: "Paris, France",
      tracking: "TRK003",
      status: "On The Way",
    },
    {
      id: "#OR125",
      customer: "Ryan Vasquez",
      date: "N/A",
      location: "N/A",
      tracking: "N/A",
      status: "Canceled",
    },
    {
      id: "#OR245",
      customer: "Donald Ness",
      date: "2024-09-12",
      location: "Tokyo, Japan",
      tracking: "TRK004",
      status: "Pending",
    },
    {
      id: "#OR300",
      customer: "Alice Cooper",
      date: "2024-08-25",
      location: "Berlin, Germany",
      tracking: "TRK005",
      status: "Delivered",
    },
    // Add more data as needed
  ];

  const totalItems = orderData.length;
  const totalPages = Math.ceil(totalItems / itemsPerPage);
  const startIndex = (currentPage - 1) * itemsPerPage;
  const currentData = orderData.slice(startIndex, startIndex + itemsPerPage);

  const handleNextPage = () => {
    if (currentPage < totalPages) {
      setCurrentPage((prev) => prev + 1);
    }
  };

  const handlePreviousPage = () => {
    if (currentPage > 1) {
      setCurrentPage((prev) => prev - 1);
    }
  };

  const handleFilterChange = (event) => {
    setTimeFilter(event.target.value);
    setCurrentPage(1);
  };

  const handleSelectRow = (id) => {
    setSelectedRows((prev) =>
      prev.includes(id) ? prev.filter((rowId) => rowId !== id) : [...prev, id]
    );
  };

  const handleSelectAll = () => {
    if (selectedRows.length === currentData.length) {
      setSelectedRows([]); // Deselect all
    } else {
      setSelectedRows(currentData.map((order) => order.id)); // Select all visible rows
    }
  };

  const isRowSelected = (id) => selectedRows.includes(id);

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-0">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 p-4">
            <h3 className="mb-0">Tracking Order</h3>
            <Form.Select
              className="month-select form-control w-135 bg-border-color border-color bg-transparent"
              value={timeFilter}
              onChange={handleFilterChange}
            >
              <option value="0">Last 30 days</option>
              <option value="1">Last 90 days</option>
              <option value="2">Last 1 year</option>
            </Form.Select>
          </div>

          <div className="default-table-area style-two transaction-history tracking-order">
            <div className="table-responsive">
              <Table className="align-middle">
                <thead>
                  <tr>
                    <th scope="col">
                      <div className="d-flex align-items-center">
                        <Form.Check
                          type="checkbox"
                          checked={
                            selectedRows.length === currentData.length &&
                            currentData.length > 0
                          }
                          onChange={handleSelectAll}
                          label=''
                        />
                        <span className="ms-1">Order ID</span>
                      </div>
                    </th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Current Location</th>
                    <th scope="col">Tracking Number</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  {currentData.map((order) => (
                    <tr
                      key={order.id}
                      className={isRowSelected(order.id) ? "table-active" : ""}
                    >
                      <td>
                        <div className="d-flex align-items-center">
                          <Form.Check
                            type="checkbox"
                            checked={isRowSelected(order.id)}
                            onChange={() => handleSelectRow(order.id)}
                            label=''
                          />
                          <span className="ms-1 text-secondary">
                            {order.id}
                          </span>
                        </div>
                      </td>
                      <td>{order.customer}</td>
                      <td>{order.date}</td>
                      <td>{order.location}</td>
                      <td>{order.tracking}</td>
                      <td>
                        <span
                          className={`d-inline-block fs-12 px-2 py-1 rounded-1 ${
                            order.status === "Delivered"
                              ? "bg-success bg-opacity-10 text-success"
                              : order.status === "In Transit"
                              ? "bg-primary bg-opacity-10 text-primary"
                              : order.status === "On The Way"
                              ? "bg-danger bg-opacity-10 text-danger"
                              : order.status === "Canceled"
                              ? "bg-danger bg-opacity-25 text-danger"
                              : "bg-warning bg-opacity-10 text-warning"
                          }`}
                        >
                          {order.status}
                        </span>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </Table>
            </div>

            <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap p-4">
              <span className="fs-12 fw-medium">
                Showing {startIndex + 1} -{" "}
                {Math.min(startIndex + itemsPerPage, totalItems)} of{" "}
                {totalItems} Results
              </span>
              <nav aria-label="Page navigation example">
                <ul className="pagination mb-0 justify-content-center">
                  <li className="page-item">
                    <Button
                      className="page-link icon"
                      onClick={handlePreviousPage}
                      disabled={currentPage === 1}
                    >
                      <i className="material-symbols-outlined">
                        keyboard_arrow_left
                      </i>
                    </Button>
                  </li>
                  <li className="page-item">
                    <Button
                      className="page-link icon"
                      onClick={handleNextPage}
                      disabled={currentPage === totalPages}
                    >
                      <i className="material-symbols-outlined">
                        keyboard_arrow_right
                      </i>
                    </Button>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default TrackingOrder;
