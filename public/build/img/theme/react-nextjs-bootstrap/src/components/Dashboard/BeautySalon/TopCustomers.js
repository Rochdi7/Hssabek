"use client";

import { useState, useEffect } from "react";
import { Table, Card, Dropdown } from "react-bootstrap";
import Image from "next/image";

const TopCustomers = () => {
  const [customers, setCustomers] = useState([]);
  const [loading, setLoading] = useState(true);

  // Pagination state
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 5;

  useEffect(() => {
    // Simulate API call (replace with actual API)
    setTimeout(() => {
      // Example data: Extend this array to simulate more items
      const data = [
        {
          id: "#001",
          name: "Johhna Loren",
          phone: "+321 427 8690",
          email: "loren123@gmail.com",
          service: "Nail Art",
          lastVisit: "17 Oct, 2024",
          status: "VIP",
          statusColor: "success",
          image: "/images/user-81.png",
        },
        {
          id: "#002",
          name: "Skyler White",
          phone: "+321 427 3980",
          email: "skyqueen@gmail.com",
          service: "Hair Cut",
          lastVisit: "18 Oct, 2024",
          status: "Royal",
          statusColor: "primary",
          image: "/images/user-80.png",
        },
        {
          id: "#003",
          name: "Alice Johnson",
          phone: "+321 123 4567",
          email: "alice@gmail.com",
          service: "Hair Coloring",
          lastVisit: "19 Oct, 2024",
          status: "Regular",
          statusColor: "warning",
          image: "/images/user-82.png",
        },
        {
          id: "#004",
          name: "Bob Smith",
          phone: "+321 987 6543",
          email: "bobsmith@gmail.com",
          service: "Massage",
          lastVisit: "20 Oct, 2024",
          status: "VIP",
          statusColor: "success",
          image: "/images/user-83.png",
        },
        {
          id: "#005",
          name: "Charlie Brown",
          phone: "+321 555 6666",
          email: "charliebrown@gmail.com",
          service: "Facial",
          lastVisit: "21 Oct, 2024",
          status: "Royal",
          statusColor: "primary",
          image: "/images/user-84.png",
        },
        {
          id: "#006",
          name: "Dana White",
          phone: "+321 444 7777",
          email: "danawhite@gmail.com",
          service: "Hair Styling",
          lastVisit: "22 Oct, 2024",
          status: "VIP",
          statusColor: "success",
          image: "/images/user-85.png",
        },
        {
          id: "#007",
          name: "Eleanor Rigby",
          phone: "+321 333 8888",
          email: "eleanor@gmail.com",
          service: "Manicure",
          lastVisit: "23 Oct, 2024",
          status: "Regular",
          statusColor: "warning",
          image: "/images/user-86.png",
        },
        {
          id: "#008",
          name: "Frank Castle",
          phone: "+321 222 9999",
          email: "punisher@gmail.com",
          service: "Beard Trim",
          lastVisit: "24 Oct, 2024",
          status: "VIP",
          statusColor: "success",
          image: "/images/user-87.png",
        },
        {
          id: "#009",
          name: "Grace Hopper",
          phone: "+321 111 0000",
          email: "hopper@gmail.com",
          service: "Skin Treatment",
          lastVisit: "25 Oct, 2024",
          status: "Royal",
          statusColor: "primary",
          image: "/images/user-88.png",
        },
        {
          id: "#010",
          name: "Henry Cavill",
          phone: "+321 999 8888",
          email: "superman@gmail.com",
          service: "Muscle Therapy",
          lastVisit: "26 Oct, 2024",
          status: "Regular",
          statusColor: "warning",
          image: "/images/user-89.png",
        },
      ];
      setCustomers(data);
      setLoading(false);
    }, 1000);
  }, []);

  // Calculate total pages
  const totalPages = Math.ceil(customers.length / itemsPerPage);

  // Get current page data
  const indexOfLastItem = currentPage * itemsPerPage;
  const indexOfFirstItem = indexOfLastItem - itemsPerPage;
  const currentCustomers = customers.slice(indexOfFirstItem, indexOfLastItem);

  // Pagination handlers
  const goToPage = (pageNumber) => {
    setCurrentPage(pageNumber);
  };

  const goToPrevPage = () => {
    if (currentPage > 1) {
      setCurrentPage((prev) => prev - 1);
    }
  };

  const goToNextPage = () => {
    if (currentPage < totalPages) {
      setCurrentPage((prev) => prev + 1);
    }
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-0">
            <h3 className="mb-0">Top Customers</h3>

            <Dropdown className="dropdown select-dropdown">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="dropdown-toggle bg-border-color border text-body rounded-2"
                style={{
                  paddingRight: "35px",
                }}
              >
                This Week
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  This Day
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  This Week
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  This Month
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  This Year
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          {loading ? (
            <p>Loading...</p>
          ) : (
            <div className="default-table-area style-two campaigns-table bs-top-customers">
              <div className="table-responsive">
                <Table className="align-middle border-0">
                  <thead>
                    <tr className="border-bottom">
                      <th
                        scope="col"
                        className=" bg-transparent text-body fw-medium"
                      >
                        <span className="fs-10 fw-bold letter-spacing-1 text-body-color-60">
                          ID
                        </span>
                      </th>
                      <th
                        scope="col"
                        className="bg-transparent text-body fw-medium"
                      >
                        <span className="fs-10 fw-bold letter-spacing-1 text-body-color-60">
                          CUSTOMER NAME
                        </span>
                      </th>
                      <th
                        scope="col"
                        className="bg-transparent text-body fw-medium"
                      >
                        <span className="fs-10 fw-bold letter-spacing-1 text-body-color-60">
                          PHONE NO
                        </span>
                      </th>
                      <th
                        scope="col"
                        className="bg-transparent text-body fw-medium"
                      >
                        <span className="fs-10 fw-bold letter-spacing-1 text-body-color-60">
                          EMAIL
                        </span>
                      </th>
                      <th
                        scope="col"
                        className="bg-transparent text-body fw-medium"
                      >
                        <span className="fs-10 fw-bold letter-spacing-1 text-body-color-60">
                          PROFFERED SERVICE
                        </span>
                      </th>
                      <th
                        scope="col"
                        className="bg-transparent text-body fw-medium"
                      >
                        <span className="fs-10 fw-bold letter-spacing-1 text-body-color-60">
                          LAST VISIT
                        </span>
                      </th>
                      <th
                        scope="col"
                        className="bg-transparent text-body fw-medium"
                      >
                        <span className="fs-10 fw-bold letter-spacing-1 text-body-color-60">
                          STATUS
                        </span>
                      </th>
                      <th
                        scope="col"
                        className="text-end bg-transparent text-body fw-medium"
                      >
                        <span className="fs-10 fw-bold letter-spacing-1 text-body-color-60">
                          ACTION
                        </span>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    {currentCustomers.map((customer, index) => (
                      <tr key={index}>
                        <td className="fs-12 fw-semibold text-body-color-50">
                          {customer.id}
                        </td>

                        <td>
                          <div className="d-flex align-items-center gap-2">
                            <div className="flex-shrink-0">
                              <Image
                                src={customer.image}
                                className="rounded-circle"
                                alt="user"
                                width={32}
                                height={32}
                              />
                            </div>
                            <div className="flex-grow-1">
                              <h4 className="fs-14 fw-semibold mb-0 text-secondary-50">
                                {customer.name}
                              </h4>
                            </div>
                          </div>
                        </td>

                        <td className="fs-12 fw-semibold text-body-color-50">
                          {customer.phone}
                        </td>

                        <td className="fs-12 fw-normal text-body">
                          {customer.email}
                        </td>

                        <td className="fs-12 fw-semibold text-body-color-50">
                          {customer.service}
                        </td>

                        <td className="fs-12 fw-semibold text-body-color-50">
                          {customer.lastVisit}
                        </td>

                        <td>
                          <span
                            className={`d-inline-block px-2 bg-${customer.statusColor} bg-opacity-10 text-${customer.statusColor} border border-${customer.statusColor} rounded-pill fs-12 fw-medium`}
                          >
                            {customer.status}
                          </span>
                        </td>

                        <td className="text-end">
                          <Dropdown className="action-opt">
                            <Dropdown.Toggle
                              variant="secondary"
                              id="dropdown-basic"
                              className="bg-transparent p-0 lh-1"
                            >
                              <i className="material-symbols-outlined">
                                more_vert
                              </i>
                            </Dropdown.Toggle>

                            <Dropdown.Menu className="bg-white border box-shadow">
                              <Dropdown.Item href="#">
                                <i className="material-symbols-outlined">
                                  edit
                                </i>
                                Edit
                              </Dropdown.Item>
                              <Dropdown.Item href="#">
                                <i className="material-symbols-outlined">
                                  visibility
                                </i>
                                View
                              </Dropdown.Item>
                              <Dropdown.Item href="#">
                                <i className="material-symbols-outlined">
                                  delete
                                </i>
                                Delete
                              </Dropdown.Item>
                            </Dropdown.Menu>
                          </Dropdown>
                        </td>
                      </tr>
                    ))}
                  </tbody>
                </Table>
              </div>

              <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap mt-4">
                <span className="fs-12 fw-medium">
                  Showing {currentCustomers.length} of {customers.length}{" "}
                  Results
                </span>

                <nav aria-label="Page navigation example">
                  <ul className="pagination mb-0 justify-content-center">
                    <li className="page-item">
                      <button
                        className={`page-link icon hover-bg ${
                          currentPage === 1 ? "disabled" : ""
                        }`}
                        onClick={goToPrevPage}
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
                            className={`page-link ${
                              currentPage === page ? "active" : ""
                            }`}
                            onClick={() => goToPage(page)}
                          >
                            {page}
                          </button>
                        </li>
                      )
                    )}

                    <li className="page-item">
                      <button
                        className={`page-link icon hover-bg ${
                          currentPage === totalPages ? "disabled" : ""
                        }`}
                        onClick={goToNextPage}
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
          )}
        </Card.Body>
      </Card>
    </>
  );
};

export default TopCustomers;
