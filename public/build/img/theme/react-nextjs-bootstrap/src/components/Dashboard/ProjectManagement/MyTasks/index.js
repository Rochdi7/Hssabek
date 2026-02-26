"use client";

import { useState } from "react";
import { Card, Form, Table } from "react-bootstrap";

const myTasksData = [
  {
    projectName: "Web Development",
    deadline: "10 Jan 2024",
    status: "completed",
  },
  {
    projectName: "UX/UI Design",
    deadline: "05 Feb 2024",
    status: "inProgress",
  },
  {
    projectName: "React Development",
    deadline: "28 Mar 2024",
    status: "cancelled",
  },
  {
    projectName: "Python Research",
    deadline: "09 Mar 2024",
    status: "pending",
  },
  {
    projectName: "Python Research",
    deadline: "09 Mar 2024",
    status: "pending",
  },
  {
    projectName: "React Development",
    deadline: "28 Mar 2024",
    status: "cancelled",
  },
  {
    projectName: "UX/UI Design",
    deadline: "05 Feb 2024",
    status: "inProgress",
  },
];

const itemsPerPage = 4;

const MyTasks = () => {
  const [currentPage, setCurrentPage] = useState(1);

  const totalItems = myTasksData.length;
  const totalPages = Math.ceil(totalItems / itemsPerPage);

  const startIndex = (currentPage - 1) * itemsPerPage;
  const currentItems = myTasksData.slice(startIndex, startIndex + itemsPerPage);

  const handlePrevious = () => {
    setCurrentPage((prev) => Math.max(prev - 1, 1));
  };

  const handleNext = () => {
    setCurrentPage((prev) => Math.min(prev + 1, totalPages));
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-0">
          <div className="p-4">
            <div className="d-flex justify-content-between align-items-center flex-wrap gap-3">
              <h3 className="mb-0">My Tasks</h3>

              <Form.Select
                className="month-select form-control p-0 h-auto border-0"
                aria-label="Default select example"
              >
                <option defaultValue="0">All Tasks</option>
                <option defaultValue="1">This Month</option>
                <option defaultValue="2">This Year</option>
              </Form.Select>
            </div>
          </div>

          <div className="default-table-area style-two my-tasks">
            <div className="table-responsive">
              <Table className="align-middle">
                <thead>
                  <tr>
                    <th scope="col">
                      <Form>
                        <Form.Check
                          type="checkbox"
                          id="default-checkbox"
                          label="Project Name"
                        />
                      </Form>
                    </th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>

                <tbody>
                  {currentItems.map((task, index) => (
                    <tr key={index}>
                      <td>
                        <Form.Check
                          type="checkbox"
                          id={`checkbox-${index}`}
                          label={task.projectName}
                          className="fw-medium fs-14"
                        />
                      </td>
                      <td>{task.deadline}</td>
                      <td>
                        <span
                          className={`badge bg-opacity-10 p-2 fs-12 fw-normal text-capitalize ${task.status}`}
                        >
                          {task.status}
                        </span>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </Table>
            </div>

            <div className="p-4 pt-lg-4">
              <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
                <span className="fs-12 fw-medium">
                  Items per page: {itemsPerPage}
                </span>

                <div className="d-flex align-items-center">
                  <span className="fs-12 fw-medium me-2">
                    {startIndex + 1} -{" "}
                    {Math.min(startIndex + itemsPerPage, totalItems)} of{" "}
                    {totalItems}
                  </span>

                  <nav aria-label="Page navigation example">
                    <ul className="pagination mb-0 justify-content-center">
                      <li className="page-item">
                        <button
                          className="page-link icon"
                          onClick={handlePrevious}
                          disabled={currentPage === 1}
                        >
                          <span className="material-symbols-outlined">
                            keyboard_arrow_left
                          </span>
                        </button>
                      </li>
                      <li className="page-item">
                        <button
                          className="page-link icon"
                          onClick={handleNext}
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
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default MyTasks;
