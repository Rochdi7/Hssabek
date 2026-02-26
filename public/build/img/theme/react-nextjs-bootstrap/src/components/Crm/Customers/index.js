"use client";

import { useState } from "react";
import { Card, Form, Table } from "react-bootstrap";
import Image from "next/image";

const customersData = [
  {
    id: "#854",
    customerImg: "/images/user-6.jpg",
    customerName: "Oliver Khan",
    email: "oliver@trezo.com",
    phone: "+1 555-123-4567",
    lastLogin: "19 Jun 2024",
    received: "$6,855",
    due: "$125",
    status: "active",
  },
  {
    id: "#853",
    customerImg: "/images/user-7.jpg",
    customerName: "Carolyn Barnes",
    email: "carolyn@trezo.com",
    phone: "+1 555-987-6543",
    lastLogin: "18 Jun 2024",
    received: "$258",
    due: "$99",
    status: "active",
  },
  {
    id: "#852",
    customerImg: "/images/user-8.jpg",
    customerName: "Donna Miller",
    email: "donna@trezo.com",
    phone: "+1 555-456-7890",
    lastLogin: "17 Jun 2024",
    received: "$3,890",
    due: "$0",
    status: "deactive",
  },
  {
    id: "#851",
    customerImg: "/images/user-9.jpg",
    customerName: "Barbara Cross",
    email: "barbara@trezo.com",
    phone: "+1 555-369-7878",
    lastLogin: "16 Jun 2024",
    received: "$2,500",
    due: "$279",
    status: "active",
  },
  {
    id: "#850",
    customerImg: "/images/user-10.jpg",
    customerName: "Rebecca Block",
    email: "rebecca@trezo.com",
    phone: "+1 555-658-4488",
    lastLogin: "15 Jun 2024",
    received: "$8,200",
    due: "$0",
    status: "deactive",
  },
  {
    id: "#849",
    customerImg: "/images/user-11.jpg",
    customerName: "Ramiro McCarty",
    email: "ramiro@trezo.com",
    phone: "+1 555-558-9966",
    lastLogin: "14 Jun 2024",
    received: "$640",
    due: "$46",
    status: "active",
  },
  {
    id: "#848",
    customerImg: "/images/user-12.jpg",
    customerName: "Robert Fairweather",
    email: "robert@trezo.com",
    phone: "+1 555-357-5888",
    lastLogin: "13 Jun 2024",
    received: "$9,100",
    due: "$184",
    status: "active",
  },
  {
    id: "#847",
    customerImg: "/images/user-13.jpg",
    customerName: "Marcelino Haddock",
    email: "marcelino@trezo.com",
    phone: "+1 555-456-8877",
    lastLogin: "12 Jun 2024",
    received: "$7,300",
    due: "$166",
    status: "active",
  },
  {
    id: "#846",
    customerImg: "/images/user-14.jpg",
    customerName: "Thomas Wilson",
    email: "thomas@trezo.com",
    phone: "+1 555-622-4488",
    lastLogin: "11 Jun 2024",
    received: "$6,600",
    due: "$0",
    status: "deactive",
  },
  {
    id: "#845",
    customerImg: "/images/user-15.jpg",
    customerName: "Nathaniel Hulsey",
    email: "nathaniel@trezo.com",
    phone: "+1 555-225-4488",
    lastLogin: "10 Jun 2024",
    received: "$2,800",
    due: "$55",
    status: "active",
  },
  {
    id: "#844",
    customerImg: "/images/user-16.jpg",
    customerName: "Johnathan Walker",
    email: "johnathan@trezo.com",
    phone: "+1 555-233-1234",
    lastLogin: "9 Jun 2024",
    received: "$5,500",
    due: "$145",
    status: "active",
  },
  {
    id: "#843",
    customerImg: "/images/user-17.jpg",
    customerName: "Emily Foster",
    email: "emily@trezo.com",
    phone: "+1 555-567-2345",
    lastLogin: "8 Jun 2024",
    received: "$2,200",
    due: "$320",
    status: "active",
  },
  {
    id: "#842",
    customerImg: "/images/user-18.jpg",
    customerName: "George Matthews",
    email: "george@trezo.com",
    phone: "+1 555-678-9999",
    lastLogin: "7 Jun 2024",
    received: "$1,500",
    due: "$190",
    status: "deactive",
  },
  {
    id: "#841",
    customerImg: "/images/user-19.jpg",
    customerName: "Clara Torres",
    email: "clara@trezo.com",
    phone: "+1 555-234-5678",
    lastLogin: "6 Jun 2024",
    received: "$4,400",
    due: "$90",
    status: "active",
  },
  {
    id: "#840",
    customerImg: "/images/user-20.jpg",
    customerName: "William Reed",
    email: "william@trezo.com",
    phone: "+1 555-876-4321",
    lastLogin: "5 Jun 2024",
    received: "$7,000",
    due: "$255",
    status: "active",
  },
  {
    id: "#839",
    customerImg: "/images/user-21.jpg",
    customerName: "Sophia Walker",
    email: "sophia@trezo.com",
    phone: "+1 555-999-8765",
    lastLogin: "4 Jun 2024",
    received: "$3,600",
    due: "$0",
    status: "deactive",
  },
  {
    id: "#838",
    customerImg: "/images/user-22.jpg",
    customerName: "Jacob Watson",
    email: "jacob@trezo.com",
    phone: "+1 555-334-4567",
    lastLogin: "3 Jun 2024",
    received: "$5,800",
    due: "$50",
    status: "active",
  },
  {
    id: "#837",
    customerImg: "/images/user-23.jpg",
    customerName: "Olivia Brown",
    email: "olivia@trezo.com",
    phone: "+1 555-567-2345",
    lastLogin: "2 Jun 2024",
    received: "$3,150",
    due: "$85",
    status: "active",
  },
  {
    id: "#836",
    customerImg: "/images/user-24.jpg",
    customerName: "James Harris",
    email: "james@trezo.com",
    phone: "+1 555-678-2345",
    lastLogin: "1 Jun 2024",
    received: "$9,600",
    due: "$430",
    status: "deactive",
  },
  {
    id: "#835",
    customerImg: "/images/user-25.jpg",
    customerName: "Hannah Moore",
    email: "hannah@trezo.com",
    phone: "+1 555-453-7890",
    lastLogin: "31 May 2024",
    received: "$4,000",
    due: "$35",
    status: "active",
  },
];

const Customers = () => {
  const [currentPage, setCurrentPage] = useState(1);
  const [statusFilter, setStatusFilter] = useState("0");
  const [searchQuery, setSearchQuery] = useState("");

  const recordsPerPage = 10;

  // Handle status filter change
  const handleStatusChange = (event) => {
    setStatusFilter(event.target.value);
    setCurrentPage(1); // Reset to page 1 when filter changes
  };

  // Handle search input change
  const handleSearchChange = (event) => {
    setSearchQuery(event.target.value);
    setCurrentPage(1); // Reset to page 1 when searching
  };

  // Filter customers based on status and search query
  const filteredData = customersData.filter((customer) => {
    const matchesStatus =
      statusFilter === "0" || customer.status === statusFilter;
    const matchesSearch =
      searchQuery === "" ||
      customer.customerName.toLowerCase().includes(searchQuery.toLowerCase()) ||
      customer.email.toLowerCase().includes(searchQuery.toLowerCase()) ||
      customer.phone.includes(searchQuery);

    return matchesStatus && matchesSearch;
  });

  // Paginate filtered data
  const indexOfLast = currentPage * recordsPerPage;
  const indexOfFirst = indexOfLast - recordsPerPage;
  const currentCustomers = filteredData.slice(indexOfFirst, indexOfLast);

  // Handle page navigation
  const handlePageChange = (pageNumber) => {
    setCurrentPage(pageNumber);
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-0">
          <div className="p-4">
            <div className="d-flex justify-content-between align-items-center flex-wrap gap-3">
              <Form className="position-relative table-src-form me-0">
                <Form.Control
                  type="text"
                  placeholder="Search here"
                  value={searchQuery}
                  onChange={handleSearchChange}
                />

                <span className="material-symbols-outlined position-absolute top-50 start-0 translate-middle-y">
                  search
                </span>
              </Form>

              <Form.Select
                className="month-select form-control"
                value={statusFilter}
                onChange={handleStatusChange}
              >
                <option value="0">All</option>
                <option value="active">Active</option>
                <option value="deactive">Deactive</option>
              </Form.Select>
            </div>
          </div>

          <div className="default-table-area style-two default-table-width">
            <div className="table-responsive">
              <Table className="align-middle">
                <thead>
                  <tr>
                    <th scope="col">
                      <Form>
                        <Form.Check
                          type="checkbox"
                          id="default-checkbox"
                          label="ID"
                        />
                      </Form>
                    </th>
                    <th scope="col">Customer</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Last Login</th>
                    <th scope="col">Received</th>
                    <th scope="col">Due</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>

                <tbody>
                  {currentCustomers.map((customer, i) => (
                    <tr key={i}>
                      <td className="text-body">
                        <Form>
                          <Form.Check
                            type="checkbox"
                            id={customer.id}
                            label={customer.id}
                          />
                        </Form>
                      </td>

                      <td>
                        <div href="#" className="d-flex align-items-center">
                          <div className="flex-shrink-0">
                            <Image
                              src={customer.customerImg}
                              className="wh-34 rounded-circle"
                              alt="user"
                              width={34}
                              height={34}
                            />
                          </div>
                          <div className="flex-grow-1 ms-2 position-relative top-1">
                            <h6 className="mb-0 fs-14 fw-medium">
                              {customer.customerName}
                            </h6>
                          </div>
                        </div>
                      </td>

                      <td className="text-body">{customer.email}</td>

                      <td>{customer.phone}</td>

                      <td className="text-body">{customer.lastLogin}</td>

                      <td className="text-body">{customer.received}</td>

                      <td className="text-body">{customer.due}</td>

                      <td>
                        <span
                          className={`badge bg-opacity-10 p-2 fs-12 fw-normal text-capitalize ${customer.status}`}
                        >
                          {customer.status}
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
                  ))}
                </tbody>
              </Table>

              {/* Pagination */}
              <div className="p-4">
                <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
                  <span className="fs-12 fw-medium">
                    Showing {indexOfFirst + 1} to{" "}
                    {Math.min(indexOfLast, filteredData.length)} of{" "}
                    {filteredData.length} Results
                  </span>

                  <nav aria-label="Page navigation example">
                    <ul className="pagination mb-0 justify-content-center">
                      <li className="page-item">
                        <button
                          className="page-link icon"
                          onClick={() => handlePageChange(currentPage - 1)}
                          disabled={currentPage === 1}
                        >
                          <span className="material-symbols-outlined">
                            keyboard_arrow_left
                          </span>
                        </button>
                      </li>

                      {[
                        ...Array(
                          Math.ceil(filteredData.length / recordsPerPage)
                        ),
                      ].map((_, index) => (
                        <li key={index} className="page-item">
                          <button
                            className={`page-link ${
                              currentPage === index + 1 ? "active" : ""
                            }`}
                            onClick={() => handlePageChange(index + 1)}
                          >
                            {index + 1}
                          </button>
                        </li>
                      ))}

                      <li className="page-item">
                        <button
                          className="page-link icon"
                          onClick={() => handlePageChange(currentPage + 1)}
                          disabled={
                            currentPage ===
                            Math.ceil(filteredData.length / recordsPerPage)
                          }
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
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default Customers;
