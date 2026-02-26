"use client";

import { useState, useEffect } from "react";
import { Card, Table, Form, Button } from "react-bootstrap";
import Image from "next/image";

// Example dynamic data (could be fetched from an API)
const mockLeaveRequests = [
  {
    id: 1,
    name: "John Doe",
    department: "Marketing",
    leaveType: "Vacation",
    days: 3,
    status: "Approved",
    imageUrl: "/images/user-1.jpg",
  },
  {
    id: 2,
    name: "Jane Smith",
    department: "HR",
    leaveType: "Sick Leave",
    days: 2,
    status: "Pending",
    imageUrl: "/images/user-2.jpg",
  },
  {
    id: 3,
    name: "Alex Johnson",
    department: "Developer",
    leaveType: "Maternity Leave",
    days: 4,
    status: "Rejected",
    imageUrl: "/images/user-3.jpg",
  },
  {
    id: 4,
    name: "Emily Davis",
    department: "UX Designer",
    leaveType: "Vacation",
    days: 2,
    status: "Approved",
    imageUrl: "/images/user-4.jpg",
  },
  {
    id: 5,
    name: "Michael Brown",
    department: "Finance",
    leaveType: "Personal Leave",
    days: 1,
    status: "Pending",
    imageUrl: "/images/user-5.jpg",
  },
  {
    id: 6,
    name: "Chris Evans",
    department: "IT",
    leaveType: "Vacation",
    days: 5,
    status: "Approved",
    imageUrl: "/images/user-6.jpg",
  },
  {
    id: 7,
    name: "Natasha Romanoff",
    department: "Operations",
    leaveType: "Sick Leave",
    days: 3,
    status: "Pending",
    imageUrl: "/images/user-7.jpg",
  },
  {
    id: 8,
    name: "Jhonson Jhon",
    department: "Web Developer",
    leaveType: "Sick Leave",
    days: 5,
    status: "Approved",
    imageUrl: "/images/user-8.jpg",
  },
  {
    id: 9,
    name: "Alex Lee",
    department: "Developer",
    leaveType: "Maternity Leave",
    days: 4,
    status: "Rejected",
    imageUrl: "/images/user-9.jpg",
  },
  {
    id: 10,
    name: "Emily Jhon",
    department: "UX Designer",
    leaveType: "Vacation",
    days: 2,
    status: "Approved",
    imageUrl: "/images/user-10.jpg",
  },
];

const EmployeeLeaveRequest = () => {
  const [leaveRequests, setLeaveRequests] = useState([]);
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 5;

  useEffect(() => {
    // Simulate fetching data
    setLeaveRequests(mockLeaveRequests);
  }, []);

  const totalPages = Math.ceil(leaveRequests.length / itemsPerPage);

  const handlePageChange = (page) => {
    if (page >= 1 && page <= totalPages) {
      setCurrentPage(page);
    }
  };

  const paginatedData = leaveRequests.slice(
    (currentPage - 1) * itemsPerPage,
    currentPage * itemsPerPage
  );

  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-0">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 custom-padding-30 border-bottom pb-4">
          <h3 className="mb-0">Employee Leave Request</h3>

          <Form.Select
            className="month-select form-control w-135 bg-border-color border-color bg-transparent"
            aria-label="Default select example"
          >
            <option>This Month</option>
            <option value="0">This Week</option>
            <option value="1">This Year</option>
          </Form.Select>
        </div>

        <div className="default-table-area style-three employee-leave-request">
          <div className="table-responsive">
            <Table className="align-middle border-0">
              <thead className="border-bottom">
                <tr>
                  <th scope="col" className="bg-transparent">
                    Employee
                  </th>
                  <th scope="col" className="bg-transparent">
                    Leave Type
                  </th>
                  <th scope="col" className="bg-transparent">
                    Days
                  </th>
                  <th scope="col" className="bg-transparent">
                    Status
                  </th>
                  <th scope="col" className="bg-transparent">
                    Action
                  </th>
                </tr>
              </thead>
              <tbody>
                {paginatedData.length === 0 ? (
                  <tr>
                    <td colSpan="5" className="text-center">
                      No leave requests found.
                    </td>
                  </tr>
                ) : (
                  paginatedData.map((request) => (
                    <tr key={request.id}>
                      <td>
                        <div className="d-flex align-items-center">
                          <div className="flex-shrink-0">
                            <Image
                              src={request.imageUrl}
                              className="rounded-circle"
                              alt="user"
                              width={40}
                              height={40}
                            />
                          </div>
                          <div className="flex-grow-1 ms-2">
                            <h4 className="fs-14 fw-medium mb-0">
                              {request.name}
                            </h4>
                            <span className="fs-12 text-body">
                              {request.department}
                            </span>
                          </div>
                        </div>
                      </td>
                      <td className="fw-medium">{request.leaveType}</td>
                      <td className="fw-medium">{request.days}</td>
                      <td>
                        <span
                          className={`badge ${
                            request.status === "Approved"
                              ? "bg-success bg-opacity-10 text-success"
                              : request.status === "Pending"
                              ? "bg-warning bg-opacity-10 text-warning"
                              : "bg-danger bg-opacity-10 text-danger"
                          } p-2 fs-12 fw-normal`}
                        >
                          {request.status}
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
                )}
              </tbody>
            </Table>
          </div>

          <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 custom-padding-30 pt-4">
            <span className="fs-12 fw-medium">
              Showing {(currentPage - 1) * itemsPerPage + 1}-
              {Math.min(currentPage * itemsPerPage, leaveRequests.length)} of{" "}
              {leaveRequests.length} Results
            </span>

            <nav aria-label="Page navigation example">
              <ul className="pagination mb-0 justify-content-center">
                <li className="page-item">
                  <Button
                    className="page-link icon"
                    onClick={() => handlePageChange(currentPage - 1)}
                  >
                    <i className="material-symbols-outlined">
                      keyboard_arrow_left
                    </i>
                  </Button>
                </li>
                {Array.from({ length: totalPages }, (_, index) => (
                  <li key={index} className="page-item">
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
  );
};

export default EmployeeLeaveRequest;
