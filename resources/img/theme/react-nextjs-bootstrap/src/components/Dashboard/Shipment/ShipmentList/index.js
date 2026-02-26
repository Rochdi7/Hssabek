"use client";

import { useState } from "react";
import { Card, Form, Table, Button, Dropdown } from "react-bootstrap";
import Image from "next/image";

const ShipmentList = () => {
  // Dynamic shipment data
  const shipments = [
    {
      id: "#0015",
      customerName: "David Farrior",
      customerImage: "/images/user-1.jpg",
      products: "Toys",
      cost: "$50,000",
      shipDate: "2024-10-01",
      origin: "New York, USA",
      method: "Air",
      status: "Delivered",
      statusClass: "success",
    },
    {
      id: "#0016",
      customerName: "Leslie Yawn",
      customerImage: "/images/user-2.jpg",
      products: "Sports",
      cost: "$1,20,000",
      shipDate: "2024-09-28",
      origin: "Shanghai, China",
      method: "Sea",
      status: "In Transit",
      statusClass: "primary",
    },
    {
      id: "#0017",
      customerName: "Willie Wood",
      customerImage: "/images/user-3.jpg",
      products: "Fashion",
      cost: "$50,000",
      shipDate: "2024-09-25",
      origin: "Berlin, Germany",
      method: "Road",
      status: "On The Way",
      statusClass: "danger",
    },
    {
      id: "#0018",
      customerName: "Jill Caldera",
      customerImage: "/images/user-4.jpg",
      products: "Food",
      cost: "$80,000",
      shipDate: "2024-09-22",
      origin: "Tokyo, Japan",
      method: "Air",
      status: "Delivered",
      statusClass: "success",
    },
    {
      id: "#0019",
      customerName: "Bill Mitchell",
      customerImage: "/images/user-5.jpg",
      products: "Electronics",
      cost: "$1,50,000",
      shipDate: "2024-09-20",
      origin: "Madrid, Spain",
      method: "Sea",
      status: "Pending",
      statusClass: "danger",
    },
    {
      id: "#0020",
      customerName: "Willie Wood",
      customerImage: "/images/user-3.jpg",
      products: "Fashion",
      cost: "$50,000",
      shipDate: "2024-09-25",
      origin: "Berlin, Germany",
      method: "Road",
      status: "On The Way",
      statusClass: "danger",
    },
    {
      id: "#0021",
      customerName: "David Farrior",
      customerImage: "/images/user-1.jpg",
      products: "Toys",
      cost: "$50,000",
      shipDate: "2024-10-01",
      origin: "New York, USA",
      method: "Air",
      status: "Delivered",
      statusClass: "success",
    },
    {
      id: "#0022",
      customerName: "Leslie Yawn",
      customerImage: "/images/user-2.jpg",
      products: "Sports",
      cost: "$1,20,000",
      shipDate: "2024-09-28",
      origin: "Shanghai, China",
      method: "Sea",
      status: "In Transit",
      statusClass: "primary",
    },
    {
      id: "#0023",
      customerName: "Jill Caldera",
      customerImage: "/images/user-4.jpg",
      products: "Food",
      cost: "$80,000",
      shipDate: "2024-09-22",
      origin: "Tokyo, Japan",
      method: "Air",
      status: "Delivered",
      statusClass: "success",
    },
    {
      id: "#0024",
      customerName: "Bill Mitchell",
      customerImage: "/images/user-5.jpg",
      products: "Electronics",
      cost: "$1,50,000",
      shipDate: "2024-09-20",
      origin: "Madrid, Spain",
      method: "Sea",
      status: "Pending",
      statusClass: "danger",
    },
  ];

  const [searchTerm, setSearchTerm] = useState("");
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 5;

  const filteredShipments = shipments.filter(
    (shipment) =>
      shipment.customerName.toLowerCase().includes(searchTerm.toLowerCase()) ||
      shipment.products.toLowerCase().includes(searchTerm.toLowerCase()) ||
      shipment.id.toLowerCase().includes(searchTerm.toLowerCase())
  );

  const totalPages = Math.ceil(filteredShipments.length / itemsPerPage);
  const startIndex = (currentPage - 1) * itemsPerPage;
  const currentShipments = filteredShipments.slice(
    startIndex,
    startIndex + itemsPerPage
  );

  const handleSearchChange = (e) => {
    setSearchTerm(e.target.value);
    setCurrentPage(1); // Reset to the first page when the search term changes
  };

  const handlePrevious = () => {
    if (currentPage > 1) {
      setCurrentPage(currentPage - 1);
    }
  };

  const handleNext = () => {
    if (currentPage < totalPages) {
      setCurrentPage(currentPage + 1);
    }
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-0">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 p-4">
            <h3 className="mb-0">Shipment List</h3>
            <div className="d-flex flex-wrap gap-2 gap-sm-3 align-items-center">
              <Form className="position-relative table-src-form me-0">
                <Form.Control
                  type="text"
                  placeholder="Search here"
                  value={searchTerm}
                  onChange={handleSearchChange}
                />
                <i className="material-symbols-outlined position-absolute top-50 start-0 translate-middle-y">
                  search
                </i>
              </Form>

              <Form.Select
                className="month-select form-control w-135 bg-border-color border-color bg-transparent"
                aria-label="Default select example"
              >
                <option value="0">Last 30 days</option>
                <option value="1">Last 90 days</option>
                <option value="2">Last 1 year</option>
              </Form.Select>
            </div>
          </div>

          <div className="default-table-area style-two shipment-list">
            <div className="table-responsive">
              <Table className="align-middle">
                <thead>
                  <tr>
                    <th scope="col">
                      <div className="d-flex align-items-center">
                        <div className="form-check">
                          <input className="form-check-input" type="checkbox" />
                        </div>
                        <span className="ms-1">Shipment ID</span>
                      </div>
                    </th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Products</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Ship Date</th>
                    <th scope="col">Origin</th>
                    <th scope="col">Shipment Method</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  {currentShipments.map((shipment) => (
                    <tr key={shipment.id}>
                      <td>
                        <div className="d-flex align-items-center">
                          <div className="form-check">
                            <input
                              className="form-check-input"
                              type="checkbox"
                            />
                          </div>
                          <span className="ms-1 text-secondary">
                            {shipment.id}
                          </span>
                        </div>
                      </td>
                      <td>
                        <div className="d-flex align-items-center">
                          <Image
                            src={shipment.customerImage}
                            className="wh-30 rounded-circle"
                            alt="user"
                            width={30}
                            height={30}
                          />
                          <div className="ms-2">
                            <h6 className="fw-medium fs-14 m-0">
                              {shipment.customerName}
                            </h6>
                          </div>
                        </div>
                      </td>
                      <td>{shipment.products}</td>
                      <td className="text-danger">{shipment.cost}</td>
                      <td>{shipment.shipDate}</td>
                      <td>{shipment.origin}</td>
                      <td>{shipment.method}</td>
                      <td>
                        <span
                          className={`badge bg-${shipment.statusClass} bg-opacity-10 text-${shipment.statusClass} p-2 fs-12 fw-normal`}
                        >
                          {shipment.status}
                        </span>
                      </td>
                      <td>
                        <Dropdown className="action-opt text-center">
                          <Dropdown.Toggle className="btn bg-transparent p-0">
                            <i className="ri-more-fill"></i>
                          </Dropdown.Toggle>
                          <Dropdown.Menu className="bg-white border-0 box-shadow">
                            <Dropdown.Item>
                              <i className="ri-edit-2-line"></i> Edit
                            </Dropdown.Item>
                            <Dropdown.Item>
                              <i className="ri-eye-line"></i> View
                            </Dropdown.Item>
                            <Dropdown.Item>
                              <i className="ri-delete-bin-6-line"></i> Delete
                            </Dropdown.Item>
                          </Dropdown.Menu>
                        </Dropdown>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </Table>
            </div>
            <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap p-4">
              <span className="fs-12 fw-medium">
                Showing {currentShipments.length} of {shipments.length} Results
              </span>
              <nav aria-label="Page navigation example">
                <ul className="pagination mb-0 justify-content-center">
                  <li className="page-item">
                    <Button
                      className={`page-link icon ${
                        currentPage === 1 ? "disabled" : ""
                      }`}
                      onClick={handlePrevious}
                    >
                      <i className="material-symbols-outlined">
                        keyboard_arrow_left
                      </i>
                    </Button>
                  </li>
                  <li className="page-item">
                    <Button
                      className={`page-link icon ${
                        currentPage === totalPages ? "disabled" : ""
                      }`}
                      onClick={handleNext}
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

export default ShipmentList;
