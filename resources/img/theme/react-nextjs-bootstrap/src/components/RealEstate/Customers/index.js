"use client";

import { Card, Button, Table, Form, Row, Col } from "react-bootstrap";
import Image from "next/image";
import { useState, useEffect } from "react";
import AddANewCustomerModal from "./AddANewCustomerModal";

const Customers = () => {
  const [customers, setCustomers] = useState([]); // Original customer data
  const [filteredCustomers, setFilteredCustomers] = useState([]); // Filtered data for display
  const [searchQuery, setSearchQuery] = useState(""); // Search input state
  const [currentPage, setCurrentPage] = useState(1);
  const [pageSize] = useState(10);
  const [selectAll, setSelectAll] = useState(false);

  useEffect(() => {
    // Fetch or simulate customer data here
    const fetchData = async () => {
      const data = [
        {
          id: "#TRE0015",
          name: "Sarah Johnson",
          image: "/images/user-1.jpg",
          location: "74 Grim Avenue San Diego",
          joinDate: "2024-10-01",
          phone: "(123) 456-7890",
          email: "sarah@email.com",
          type: "Buyer",
          selected: false,
        },
        {
          id: "#TRE0016",
          name: "Michael Smith",
          image: "/images/user-2.jpg",
          location: "123 Elm Street Denver",
          joinDate: "2023-09-15",
          phone: "(987) 654-3210",
          email: "michael@email.com",
          type: "Seller",
          selected: false,
        },
        {
          id: "#TRE0017",
          name: "Emily Brown",
          image: "/images/user-3.jpg",
          location: "61 Ottis Street Oklahoma City",
          joinDate: "2024-09-25",
          phone: "(555) 258-1598",
          email: "brown@email.com",
          type: "Commercial",
          selected: false,
        },
        {
          id: "#TRE0018",
          name: "Jason Lee",
          image: "/images/user-4.jpg",
          location: "Residential",
          joinDate: "2024-09-22",
          phone: "(444) 789-0123",
          email: "lee@email.com",
          type: "Investor",
          selected: false,
        },
        {
          id: "#TRE0019",
          name: "Ashley Davis",
          image: "/images/user-5.jpg",
          location: "01 Lakeland Terrace Detroit",
          joinDate: "2024-09-20",
          phone: "(333) 456-3333",
          email: "davis@email.com",
          type: "Industrial",
          selected: false,
        },
        {
          id: "#TRE0020",
          name: "Shirley Cooper",
          image: "/images/user-6.jpg",
          location: "29 Aviation Way Los Angeles",
          joinDate: "2024-09-23",
          phone: "(111) 775-8890",
          email: "cooper@email.com",
          type: "Buyer",
          selected: false,
        },
        {
          id: "#TRE0021",
          name: "Bret Brown",
          image: "/images/user-7.jpg",
          location: "2 Little Acres Lane Mattoon",
          joinDate: "2024-09-27",
          phone: "(555) 222-3365",
          email: "bret@email.com",
          type: "Buyer",
          selected: false,
        },
        {
          id: "#TRE0022",
          name: "Frances Mills",
          image: "/images/user-8.jpg",
          location: "	47 Hope Street Portland",
          joinDate: "2024-09-28",
          phone: "(222) 722-8750",
          email: "mills@email.com",
          type: "Buyer",
          selected: false,
        },

        {
          id: "#TRE0023",
          name: "Emily Brown",
          image: "/images/user-3.jpg",
          location: "61 Ottis Street Oklahoma City",
          joinDate: "2024-09-25",
          phone: "(555) 258-1598",
          email: "brown@email.com",
          type: "Commercial",
          selected: false,
        },
        {
          id: "#TRE0024",
          name: "Sarah Johnson",
          image: "/images/user-1.jpg",
          location: "74 Grim Avenue San Diego",
          joinDate: "2024-10-01",
          phone: "(123) 456-7890",
          email: "sarah@email.com",
          type: "Buyer",
          selected: false,
        },
        {
          id: "#TRE0025",
          name: "Michael Smith",
          image: "/images/user-2.jpg",
          location: "123 Elm Street Denver",
          joinDate: "2023-09-15",
          phone: "(987) 654-3210",
          email: "michael@email.com",
          type: "Seller",
          selected: false,
        },
        {
          id: "#TRE0026",
          name: "Jason Lee",
          image: "/images/user-4.jpg",
          location: "Residential",
          joinDate: "2024-09-22",
          phone: "(444) 789-0123",
          email: "lee@email.com",
          type: "Investor",
          selected: false,
        },
        {
          id: "#TRE0027",
          name: "Bret Brown",
          image: "/images/user-7.jpg",
          location: "2 Little Acres Lane Mattoon",
          joinDate: "2024-09-27",
          phone: "(555) 222-3365",
          email: "bret@email.com",
          type: "Buyer",
          selected: false,
        },
        {
          id: "#TRE0028",
          name: "Frances Mills",
          image: "/images/user-8.jpg",
          location: "	47 Hope Street Portland",
          joinDate: "2024-09-28",
          phone: "(222) 722-8750",
          email: "mills@email.com",
          type: "Buyer",
          selected: false,
        },
        {
          id: "#TRE0029",
          name: "Ashley Davis",
          image: "/images/user-5.jpg",
          location: "01 Lakeland Terrace Detroit",
          joinDate: "2024-09-20",
          phone: "(333) 456-3333",
          email: "davis@email.com",
          type: "Industrial",
          selected: false,
        },
        {
          id: "#TRE0030",
          name: "Shirley Cooper",
          image: "/images/user-6.jpg",
          location: "29 Aviation Way Los Angeles",
          joinDate: "2024-09-23",
          phone: "(111) 775-8890",
          email: "cooper@email.com",
          type: "Buyer",
          selected: false,
        },
      ];
      setCustomers(data);
      setFilteredCustomers(data); // Initialize filtered data
    };

    fetchData();
  }, []);

  const handleSearch = (event) => {
    const query = event.target.value.toLowerCase();
    setSearchQuery(query);

    // Filter based on query matching name, email, or ID
    const filtered = customers.filter(
      (customer) =>
        customer.name.toLowerCase().includes(query) ||
        customer.email.toLowerCase().includes(query) ||
        customer.id.toLowerCase().includes(query)
    );

    setFilteredCustomers(filtered);
    setCurrentPage(1); // Reset to first page on search
  };

  const handlePageChange = (direction) => {
    if (
      direction === "next" &&
      currentPage * pageSize < filteredCustomers.length
    ) {
      setCurrentPage((prev) => prev + 1);
    } else if (direction === "prev" && currentPage > 1) {
      setCurrentPage((prev) => prev - 1);
    }
  };

  const handleSelectAll = () => {
    const updatedCustomers = filteredCustomers.map((customer, index) => {
      const isOnCurrentPage =
        index >= (currentPage - 1) * pageSize && index < currentPage * pageSize;
      return isOnCurrentPage ? { ...customer, selected: !selectAll } : customer;
    });
    setFilteredCustomers(updatedCustomers);
    setSelectAll(!selectAll);
  };

  const handleRowSelect = (index) => {
    const updatedCustomers = [...filteredCustomers];
    updatedCustomers[index].selected = !updatedCustomers[index].selected;
    setFilteredCustomers(updatedCustomers);
  };

  const displayedCustomers = filteredCustomers.slice(
    (currentPage - 1) * pageSize,
    currentPage * pageSize
  );

  return (
    <>
      <Row className="pb-4 align-items-center">
        <Col sm={5}>
          <div className="pe-md-5 me-md-5">
            <Form className="src-form position-relative">
              <Form.Control
                type="text"
                style={{ height: "45px" }}
                placeholder="Search here....."
                value={searchQuery}
                onChange={handleSearch}
              />
              <button
                type="button"
                className="position-absolute top-50 end-0 translate-middle-y bg-transparent p-0 border-0"
              >
                <span className="material-symbols-outlined position-relative top-5 text-primary pe-2">
                  search
                </span>
              </button>
            </Form>
          </div>
        </Col>

        <Col sm={7}>
          <AddANewCustomerModal />
        </Col>
      </Row>

      <Card className="bg-white border-0 rounded-3 mb-4 pt-4">
        <Card.Body className="p-0">
          <div className="default-table-area style-two real-estate-customers">
            <div className="table-responsive">
              <Table className="align-middle">
                <thead>
                  <tr>
                    <th scope="col">
                      <div className="d-flex align-items-center">
                        <div className="form-check">
                          <input
                            type="checkbox"
                            className="form-check-input"
                            aria-label="Select all"
                            checked={selectAll}
                            onChange={handleSelectAll}
                            value=""
                          />
                        </div>
                        <span className="ms-1">Customer ID</span>
                      </div>
                    </th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Join Date</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Customer Type</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  {displayedCustomers.map((customer, index) => {
                    const globalIndex = (currentPage - 1) * pageSize + index;
                    return (
                      <tr key={globalIndex}>
                        <td>
                          <div className="d-flex align-items-center">
                            <div className="form-check">
                              <input
                                type="checkbox"
                                className="form-check-input"
                                aria-label={`Select ${customer.id}`}
                                checked={customer.selected}
                                onChange={() => handleRowSelect(globalIndex)}
                                value=""
                              />
                            </div>
                            <span className="ms-1 text-secondary">
                              {customer.id}
                            </span>
                          </div>
                        </td>
                        <td>
                          <div className="d-flex align-items-center">
                            <Image
                              src={customer.image}
                              className="wh-44 rounded-2"
                              alt={customer.name}
                              width={44}
                              height={44}
                            />
                            <div className="ms-2">
                              <h6 className="fw-medium fs-14 m-0">
                                {customer.name}
                              </h6>
                            </div>
                          </div>
                        </td>
                        <td>{customer.location}</td>
                        <td>{customer.joinDate}</td>
                        <td>{customer.phone}</td>
                        <td className="text-primary">{customer.email}</td>
                        <td>{customer.type}</td>
                        <td>
                          <div className="d-flex align-items-center gap-1">
                            <button className="ps-0 border-0 bg-transparent lh-1">
                              <i className="material-symbols-outlined fs-16 text-primary">
                                visibility
                              </i>
                            </button>
                            <button className="ps-0 border-0 bg-transparent lh-1">
                              <i className="material-symbols-outlined fs-16 text-body">
                                edit
                              </i>
                            </button>
                            <button className="ps-0 border-0 bg-transparent lh-1">
                              <i className="material-symbols-outlined fs-16 text-danger">
                                delete
                              </i>
                            </button>
                          </div>
                        </td>
                      </tr>
                    );
                  })}
                </tbody>
              </Table>
            </div>
            <div className="d-flex justify-content-between align-items-center p-4">
              <span className="fs-12 fw-medium">
                Showing{" "}
                {Math.min(filteredCustomers.length, currentPage * pageSize)} of{" "}
                {filteredCustomers.length} Results
              </span>
              <nav aria-label="Pagination">
                <ul className="pagination mb-0">
                  <li className="page-item">
                    <Button
                      className="page-link icon"
                      onClick={() => handlePageChange("prev")}
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
                      onClick={() => handlePageChange("next")}
                      disabled={
                        currentPage * pageSize >= filteredCustomers.length
                      }
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

export default Customers;
