"use client";

import Image from "next/image";
import { Card, Table, Form, Button, Dropdown } from "react-bootstrap";
import { useState, useEffect } from "react";

const EmployeeList = () => {
  const [students, setStudents] = useState([]);
  const [sortConfig, setSortConfig] = useState({ key: null, direction: "asc" });
  const [searchQuery, setSearchQuery] = useState("");
  const [currentPage, setCurrentPage] = useState(1); // Track the current page
  const [itemsPerPage, setItemsPerPage] = useState(7); // Set the number of items per page

  // Simulating fetching data from an API
  useEffect(() => {
    const fetchStudents = async () => {
      const data = [
        {
          id: 101,
          name: "Emily Johnson",
          email: "emily@gmail.com",
          subject: "Math",
          class: "5A",
          contact: "(555) 123-4567",
          results: "89% Overall (A)",
          status: "Passed",
          statusClass: "success",
          image: "/images/user-6.jpg",
        },
        {
          id: 102,
          name: "Michael Thompson",
          email: "lmichael@gmail.com",
          subject: "English",
          class: "8B",
          contact: "(555) 234-5678",
          results: "32% Overall (F)",
          status: "Fail",
          statusClass: "danger",
          image: "/images/user-7.jpg",
        },
        {
          id: 103,
          name: "Sarah Williams",
          email: "sarah@gmail.com",
          subject: "Geography",
          class: "4C",
          contact: "(555) 345-6789",
          results: "92% Overall (A+)",
          status: "Dropped",
          statusClass: "primary",
          image: "/images/user-8.jpg",
        },
        {
          id: 104,
          name: "David Anderson",
          email: "david@gmail.com",
          subject: "Physics",
          class: "6A",
          contact: "(555) 456-7890",
          results: "85% Overall (B+)",
          status: "Passed",
          statusClass: "success",
          image: "/images/user-9.jpg",
        },
        {
          id: 105,
          name: "Jessica Martinez",
          email: "jessica@gmail.com",
          subject: "History",
          class: "7B",
          contact: "(555) 567-8901",
          results: "25% Overall (F)",
          status: "Fail",
          statusClass: "danger",
          image: "/images/user-10.jpg",
        },
        {
          id: 106,
          name: "James Lee",
          email: "james@gmail.com",
          subject: "Biology",
          class: "5B",
          contact: "(555) 567-8901",
          results: "88% Overall (A)",
          status: "Passed",
          statusClass: "success",
          image: "/images/user-11.jpg",
        },
        {
          id: 107,
          name: "Ethan Clark",
          email: "ethan@gmail.com",
          subject: "Music",
          class: "8A",
          contact: "(555) 789-0123",
          results: "93% Overall (A+)",
          status: "Passed",
          statusClass: "success",
          image: "/images/user-12.jpg",
        },
        {
          id: 108,
          name: "Oliver Thomas",
          email: "oliver@gmail.com",
          subject: "English",
          class: "8A",
          contact: "(555) 789-0124",
          results: "90% Overall (A+)",
          status: "Passed",
          statusClass: "success",
          image: "/images/user-13.jpg",
        },
        {
          id: 109,
          name: "George James",
          email: "george@gmail.com",
          subject: "Math",
          class: "6A",
          contact: "(555) 789-0125",
          results: "75% Overall (A)",
          status: "Passed",
          statusClass: "success",
          image: "/images/user-14.jpg",
        },
        {
          id: 110,
          name: "Charles Lee",
          email: "charles@gmail.com",
          subject: "Biology",
          class: "5B",
          contact: "(555) 567-8901",
          results: "30% Overall (A)",
          status: "Fail",
          statusClass: "danger",
          image: "/images/user-15.jpg",
        },
      ];
      setStudents(data);
    };
    fetchStudents();
  }, []);

  const handleSort = (key) => {
    let direction = "asc";
    if (sortConfig.key === key && sortConfig.direction === "asc") {
      direction = "desc";
    }
    setSortConfig({ key, direction });

    const sortedData = [...students].sort((a, b) => {
      if (a[key] < b[key]) {
        return direction === "asc" ? -1 : 1;
      }
      if (a[key] > b[key]) {
        return direction === "asc" ? 1 : -1;
      }
      return 0;
    });

    setStudents(sortedData);
  };

  const handleSearch = (event) => {
    setSearchQuery(event.target.value);
  };

  const filteredStudents = students.filter((student) =>
    student.name.toLowerCase().includes(searchQuery.toLowerCase())
  );

  const totalPages = Math.ceil(filteredStudents.length / itemsPerPage);

  const handlePageChange = (pageNumber) => {
    setCurrentPage(pageNumber);
  };

  // Slice the filtered list based on currentPage and itemsPerPage
  const currentStudents = filteredStudents.slice(
    (currentPage - 1) * itemsPerPage,
    currentPage * itemsPerPage
  );

  return (
    <>
      <Card className="rounded-3 bg-white border-0 mb-4">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 custom-padding-30 border-bottom pb-4 custom-padding-30">
          <h3 className="mb-0">Students List</h3>

          <div className="d-flex align-items-center">
            <Form className="position-relative table-src-form">
              <Form.Control
                type="text"
                className="border-0"
                style={{ width: "265px" }}
                placeholder="Search for a name..."
                value={searchQuery}
                onChange={handleSearch}
              />
              <i className="material-symbols-outlined position-absolute top-50 start-0 translate-middle-y">
                search
              </i>
            </Form>

            <Dropdown className="action-opt ms-e-10">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0 lh-1"
              >
                <i className="material-symbols-outlined">more_vert</i>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#">This Day</Dropdown.Item>
                <Dropdown.Item href="#">This Week</Dropdown.Item>
                <Dropdown.Item href="#">This Month</Dropdown.Item>
                <Dropdown.Item href="#">This Year</Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>
        </div>

        <div className="default-table-area style-three employee-list">
          <div className="table-responsive">
            <Table className="align-middle border-0">
              <thead className="border-bottom">
                <tr>
                  <th scope="col" className="bg-transparent">
                    <button
                      type="button"
                      className="btn p-0 border-none"
                      onClick={() => handleSort("id")}
                    >
                      ID <i className="ri-expand-up-down-fill"></i>
                    </button>
                  </th>
                  <th scope="col" className="bg-transparent">
                    <button
                      type="button"
                      className="btn p-0 border-none"
                      onClick={() => handleSort("name")}
                    >
                      Name <i className="ri-expand-up-down-fill"></i>
                    </button>
                  </th>
                  <th scope="col" className="bg-transparent">
                    <button
                      type="button"
                      className="btn p-0 border-none"
                      onClick={() => handleSort("subject")}
                    >
                      Subjects <i className="ri-expand-up-down-fill"></i>
                    </button>
                  </th>
                  <th scope="col" className="bg-transparent">
                    <button
                      type="button"
                      className="btn p-0 border-none"
                      onClick={() => handleSort("class")}
                    >
                      Class <i className="ri-expand-up-down-fill"></i>
                    </button>
                  </th>
                  <th scope="col" className="bg-transparent">
                    <button
                      type="button"
                      className="btn p-0 border-none"
                      onClick={() => handleSort("contact")}
                    >
                      Contact <i className="ri-expand-up-down-fill"></i>
                    </button>
                  </th>
                  <th scope="col" className="bg-transparent">
                    <button
                      type="button"
                      className="btn p-0 border-none"
                      onClick={() => handleSort("results")}
                    >
                      Results <i className="ri-expand-up-down-fill"></i>
                    </button>
                  </th>
                  <th scope="col" className="bg-transparent">
                    <button
                      type="button"
                      className="btn p-0 border-none"
                      onClick={() => handleSort("status")}
                    >
                      Status <i className="ri-expand-up-down-fill"></i>
                    </button>
                  </th>
                  <th scope="col" className="bg-transparent">
                    Action
                  </th>
                </tr>
              </thead>
              <tbody>
                {currentStudents.length > 0 ? (
                  currentStudents.map((student) => (
                    <tr key={student.id}>
                      <td className="fw-semibold">#{student.id}</td>
                      <td>
                        <div className="d-flex align-items-center">
                          <div className="flex-shrink-0">
                            <Image
                              src={student.image}
                              className="rounded-circle"
                              alt={student.name}
                              width={44}
                              height={44}
                            />
                          </div>
                          <div className="flex-grow-1 ms-2">
                            <h4 className="fs-14 fw-semibold mb-0">
                              {student.name}
                            </h4>
                            <span className="fs-12 text-body">
                              {student.email}
                            </span>
                          </div>
                        </div>
                      </td>
                      <td className="fw-semibold">{student.subject}</td>
                      <td className="fw-semibold">{student.class}</td>
                      <td className="fw-semibold">{student.contact}</td>
                      <td className="fw-semibold">{student.results}</td>
                      <td>
                        <span
                          className={`badge bg-${student.statusClass} bg-opacity-10 text-${student.statusClass} p-2 fs-12 fw-medium`}
                        >
                          {student.status}
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
                      No data available
                    </td>
                  </tr>
                )}
              </tbody>
            </Table>
          </div>

          <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 custom-padding-30 pt-4">
            <span className="fs-12 fw-medium">
              Showing {currentStudents.length} of {filteredStudents.length}{" "}
              Results
            </span>

            <nav aria-label="Page navigation example">
              <ul className="pagination mb-0 justify-content-center">
                <li className="page-item">
                  <Button
                    className="page-link icon"
                    onClick={() =>
                      setCurrentPage((prev) => Math.max(prev - 1, 1))
                    }
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
                    onClick={() =>
                      setCurrentPage((prev) => Math.min(prev + 1, totalPages))
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
      </Card>
    </>
  );
};

export default EmployeeList;
