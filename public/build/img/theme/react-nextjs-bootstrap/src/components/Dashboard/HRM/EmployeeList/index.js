"use client";

import { Card, Table, Button, Form, Dropdown } from "react-bootstrap";
import Image from "next/image";
import { useState } from "react";

const EmployeeList = () => {
  const [employees, setEmployees] = useState([
    {
      id: "EMP001",
      name: "Olivia Turner",
      email: "olivia@gmail.com",
      department: "Marketing",
      position: "Marketing Lead",
      joiningDate: "Jan 15, 2020",
      salary: "$85,000",
      status: "Active",
      image: "/images/user-6.jpg",
    },
    {
      id: "EMP002",
      name: "Liam Bennett",
      email: "liam@gmail.com",
      department: "Human Resources",
      position: "HR Manager",
      joiningDate: "Mar 10, 2021",
      salary: "$75,000",
      status: "On Leave",
      image: "/images/user-7.jpg",
    },
    {
      id: "EMP003",
      name: "Sophia Myers",
      email: "sophia@gmail.com",
      department: "IT",
      position: "Software Engineer",
      joiningDate: "Feb 22, 2019",
      salary: "$95,000",
      status: "Active",
      image: "/images/user-8.jpg",
    },
    {
      id: "EMP004",
      name: "Ethan Collins",
      email: "ethan@gmail.com",
      department: "Sales",
      position: "Sales Manager",
      joiningDate: "Apr 12, 2022",
      salary: "$90,000",
      status: "Active",
      image: "/images/user-9.jpg",
    },
    {
      id: "EMP005",
      name: "Isabella Reed",
      email: "isabella@gmail.com",
      department: "Finance",
      position: "Financial Analyst",
      joiningDate: "Aug 05, 2020",
      salary: "$80,000",
      status: "Resigned",
      image: "/images/user-10.jpg",
    },
    {
      id: "EMP006",
      name: "Sophia Myers",
      email: "sophia@gmail.com",
      department: "IT",
      position: "Software Engineer",
      joiningDate: "Feb 22, 2019",
      salary: "$95,000",
      status: "Active",
      image: "/images/user-11.jpg",
    },
    {
      id: "EMP007",
      name: "Isabella Reed",
      email: "isabella@gmail.com",
      department: "Finance",
      position: "Financial Analyst",
      joiningDate: "Aug 05, 2020",
      salary: "$80,000",
      status: "Resigned",
      image: "/images/user-12.jpg",
    },
    {
      id: "EMP008",
      name: "Oliver Myers",
      email: "oliver@gmail.com",
      department: "IT",
      position: "Software Engineer",
      joiningDate: "Feb 22, 2019",
      salary: "$95,000",
      status: "Active",
      image: "/images/user-13.jpg",
    },
    {
      id: "EMP009",
      name: "Jack Collins",
      email: "jack@gmail.com",
      department: "Sales",
      position: "Sales Manager",
      joiningDate: "Apr 12, 2022",
      salary: "$90,000",
      status: "Active",
      image: "/images/user-14.jpg",
    },
    {
      id: "EMP0010",
      name: "Harry Reed",
      email: "harry@gmail.com",
      department: "Finance",
      position: "Financial Analyst",
      joiningDate: "Aug 05, 2020",
      salary: "$80,000",
      status: "Resigned",
      image: "/images/user-15.jpg",
    },

  ]);

  const [sortConfig, setSortConfig] = useState({ key: "id", direction: "asc" });
  const [searchTerm, setSearchTerm] = useState("");
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 5;

  const handleSearchChange = (e) => {
    setSearchTerm(e.target.value.toLowerCase());
    setCurrentPage(1); // Reset to the first page on search
  };

  const filteredEmployees = employees.filter((employee) =>
    employee.name.toLowerCase().includes(searchTerm)
  );

  const sortEmployees = (key) => {
    let direction = "asc";
    if (sortConfig.key === key && sortConfig.direction === "asc") {
      direction = "desc";
    }

    const sortedEmployees = [...employees].sort((a, b) => {
      if (key === "salary") {
        const aSalary = parseInt(a[key].replace("$", "").replace(",", ""), 10);
        const bSalary = parseInt(b[key].replace("$", "").replace(",", ""), 10);
        return direction === "asc" ? aSalary - bSalary : bSalary - aSalary;
      } else {
        return direction === "asc"
          ? a[key].localeCompare(b[key])
          : b[key].localeCompare(a[key]);
      }
    });

    setEmployees(sortedEmployees);
    setSortConfig({ key, direction });
  };

  const totalPages = Math.ceil(filteredEmployees.length / itemsPerPage);
  const startIndex = (currentPage - 1) * itemsPerPage;
  const currentEmployees = filteredEmployees.slice(
    startIndex,
    startIndex + itemsPerPage
  );

  const handlePageChange = (page) => {
    setCurrentPage(page);
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-0">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 custom-padding-30 border-bottom pb-4">
            <h3 className="mb-0">Employee List</h3>

            <div className="d-flex align-items-center">
              <Form className="position-relative table-src-form">
                <Form.Control
                  type="text"
                  id="SearchControl"
                  className="border-0"
                  style={{ width: "265px" }}
                  placeholder="Search for a name..."
                  value={searchTerm}
                  onChange={handleSearchChange}
                />
                <i className="material-symbols-outlined position-absolute top-50 start-0 translate-middle-y">
                  search
                </i>
              </Form>

              <Dropdown className="action-opt">
                <Dropdown.Toggle
                  variant="secondary"
                  id="dropdown-basic"
                  className="bg-transparent p-0 lh-1"
                >
                  <i className="material-symbols-outlined">more_vert</i>
                </Dropdown.Toggle>

                <Dropdown.Menu className="bg-white border box-shadow">
                  <Dropdown.Item href="#">
                    <i className="material-symbols-outlined">schedule</i> Today
                  </Dropdown.Item>
                  <Dropdown.Item href="#">
                    <i className="material-symbols-outlined">pie_chart</i> Last
                    7 Days
                  </Dropdown.Item>
                  <Dropdown.Item href="#">
                    <i className="material-symbols-outlined">refresh</i> Last
                    Month
                  </Dropdown.Item>
                  <Dropdown.Item href="#">
                    <i className="material-symbols-outlined">calendar_today</i>{" "}
                    Last 1 Year
                  </Dropdown.Item>
                  <Dropdown.Item href="#">
                    <i className="material-symbols-outlined">bar_chart</i> All
                    Time
                  </Dropdown.Item>
                  <Dropdown.Item href="#">
                    <i className="material-symbols-outlined">visibility</i> View
                  </Dropdown.Item>
                  <Dropdown.Item href="#">
                    <i className="material-symbols-outlined">delete</i> Delete
                  </Dropdown.Item>
                </Dropdown.Menu>
              </Dropdown>
            </div>
          </div>

          <div className="default-table-area style-three employee-list">
            <div className="table-responsive">
              <Table className="align-middle border-0">
                <thead className="border-bottom">
                  <tr>
                    <th className="bg-transparent" scope="col">
                      <button
                        type="button"
                        className="btn p-0 border-none"
                        onClick={() => sortEmployees("id")}
                      >
                        ID{" "}
                        <i
                          className={`ri-expand-up-down-fill ${
                            sortConfig.key === "id" &&
                            sortConfig.direction === "asc"
                              ? "rotate-180"
                              : ""
                          }`}
                        ></i>
                      </button>
                    </th>
                    <th className="bg-transparent" scope="col">
                      <button
                        type="button"
                        className="btn p-0 border-none"
                        onClick={() => sortEmployees("name")}
                      >
                        Employee{" "}
                        <i
                          className={`ri-expand-up-down-fill ${
                            sortConfig.key === "name" &&
                            sortConfig.direction === "asc"
                              ? "rotate-180"
                              : ""
                          }`}
                        ></i>
                      </button>
                    </th>
                    <th className="bg-transparent" scope="col">
                      <button
                        type="button"
                        className="btn p-0 border-none"
                        onClick={() => sortEmployees("department")}
                      >
                        Department{" "}
                        <i
                          className={`ri-expand-up-down-fill ${
                            sortConfig.key === "department" &&
                            sortConfig.direction === "asc"
                              ? "rotate-180"
                              : ""
                          }`}
                        ></i>
                      </button>
                    </th>
                    <th className="bg-transparent" scope="col">
                      <button
                        type="button"
                        className="btn p-0 border-none"
                        onClick={() => sortEmployees("position")}
                      >
                        Position{" "}
                        <i
                          className={`ri-expand-up-down-fill ${
                            sortConfig.key === "position" &&
                            sortConfig.direction === "asc"
                              ? "rotate-180"
                              : ""
                          }`}
                        ></i>
                      </button>
                    </th>
                    <th className="bg-transparent" scope="col">
                      <button
                        type="button"
                        className="btn p-0 border-none"
                        onClick={() => sortEmployees("joiningDate")}
                      >
                        Joining Date{" "}
                        <i
                          className={`ri-expand-up-down-fill ${
                            sortConfig.key === "joiningDate" &&
                            sortConfig.direction === "asc"
                              ? "rotate-180"
                              : ""
                          }`}
                        ></i>
                      </button>
                    </th>
                    <th className="bg-transparent" scope="col">
                      <button
                        type="button"
                        className="btn p-0 border-none"
                        onClick={() => sortEmployees("salary")}
                      >
                        Salary{" "}
                        <i
                          className={`ri-expand-up-down-fill ${
                            sortConfig.key === "salary" &&
                            sortConfig.direction === "asc"
                              ? "rotate-180"
                              : ""
                          }`}
                        ></i>
                      </button>
                    </th>
                    <th className="bg-transparent" scope="col">
                      <button
                        type="button"
                        className="btn p-0 border-none"
                        onClick={() => sortEmployees("status")}
                      >
                        Status{" "}
                        <i
                          className={`ri-expand-up-down-fill ${
                            sortConfig.key === "status" &&
                            sortConfig.direction === "asc"
                              ? "rotate-180"
                              : ""
                          }`}
                        ></i>
                      </button>
                    </th>
                    <th className="bg-transparent" scope="col">
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  {currentEmployees.length > 0 ? (
                    currentEmployees.map((employee) => (
                      <tr key={employee.id}>
                        <td className="fw-medium">{employee.id}</td>
                        <td>
                          <div className="d-flex align-items-center">
                            <div className="flex-shrink-0">
                              <Image
                                src={employee.image}
                                className="rounded-circle"
                                alt="user"
                                width={44}
                                height={44}
                              />
                            </div>
                            <div className="flex-grow-1 ms-2">
                              <h4 className="fs-14 fw-medium mb-0">
                                {employee.name}
                              </h4>
                              <span className="fs-12 text-body">
                                {employee.email}
                              </span>
                            </div>
                          </div>
                        </td>
                        <td className="fw-medium">{employee.department}</td>
                        <td className="fw-medium">{employee.position}</td>
                        <td className="fw-medium">{employee.joiningDate}</td>
                        <td className="fw-medium">{employee.salary}</td>
                        <td>
                          <span
                            className={`badge ${
                              employee.status === "Active"
                                ? "bg-success bg-opacity-10 text-success"
                                : employee.status === "Resigned"
                                ? "bg-danger bg-opacity-10 text-danger"
                                : "bg-primary-div bg-opacity-10 text-primary-div"
                            } p-2 fs-12 fw-normal`}
                          >
                            {employee.status}
                          </span>
                        </td>
                        <td>
                          <div className="d-flex align-items-center gap-2">
                            <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                              <i className="material-symbols-outlined fs-18 text-primary">
                                visibility
                              </i>
                            </button>
                            <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                              <i className="material-symbols-outlined fs-18 text-primary-div">
                                edit
                              </i>
                            </button>
                            <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                              <i className="material-symbols-outlined fs-18 text-danger">
                                delete
                              </i>
                            </button>
                          </div>
                        </td>
                      </tr>
                    ))
                  ) : (
                    <tr>
                      <td colSpan={8} className="text-center">
                        No employees found
                      </td>
                    </tr>
                  )}
                </tbody>
              </Table>
            </div>

            <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 custom-padding-30 pt-4">
              <span className="fs-12 fw-medium">
                Showing {startIndex + 1} to{" "}
                {Math.min(startIndex + itemsPerPage, employees.length)} of{" "}
                {employees.length} Results
              </span>

              <nav aria-label="Page navigation example">
                <ul className="pagination mb-0 justify-content-center">
                  <li className="page-item">
                    <Button
                      className="page-link icon"
                      disabled={currentPage === 1}
                      onClick={() => handlePageChange(currentPage - 1)}
                    >
                      <i className="material-symbols-outlined">
                        keyboard_arrow_left
                      </i>
                    </Button>
                  </li>
                  {Array.from({ length: totalPages }, (_, index) => (
                    <li className="page-item" key={index}>
                      <Button
                        className={`page-link ${
                          currentPage === index + 1 ? "active" : ""
                        }`}
                        onClick={() => handlePageChange(index + 1)}
                      >
                        {index + 1}
                      </Button>
                    </li>
                  ))}
                  <li className="page-item">
                    <Button
                      className="page-link icon"
                      disabled={currentPage === totalPages}
                      onClick={() => handlePageChange(currentPage + 1)}
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

export default EmployeeList;
