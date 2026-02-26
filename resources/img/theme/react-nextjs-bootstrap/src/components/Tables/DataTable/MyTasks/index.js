"use client";

import { Card, Form, Table } from "react-bootstrap";
import Link from "next/link";

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

const MyTasks = () => {
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
                <option vadefaultValuelue="0">All Tasks</option>
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
                  {myTasksData &&
                    myTasksData.slice(0, 5).map((value, i) => (
                      <tr key={i}>
                        <td>
                          <Form>
                            <Form.Check
                              type="checkbox"
                              id="default-checkbox"
                              label={value.projectName}
                              className="fw-medium fs-14"
                            />
                          </Form>
                        </td>

                        <td>{value.deadline}</td>

                        <td>
                          <span
                            className={`badge bg-opacity-10 p-2 fs-12 fw-normal text-capitalize ${value.status}`}
                          >
                            {value.status}
                          </span>
                        </td>
                      </tr>
                    ))}
                </tbody>
              </Table>
            </div>

            <div className="p-4 pt-lg-4">
              <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
                <span className="fs-12 fw-medium">Items per pages: 5</span>

                <div className="d-flex align-items-center">
                  <span className="fs-12 fw-medium me-2">1 - 5 of 12</span>

                  <nav aria-label="Page navigation example">
                    <ul className="pagination mb-0 justify-content-center">
                      <li className="page-item">
                        <Link
                          className="page-link icon"
                          href="#"
                          aria-label="Previous"
                        >
                          <span className="material-symbols-outlined">
                            keyboard_arrow_left
                          </span>
                        </Link>
                      </li>
                      <li className="page-item">
                        <Link
                          className="page-link icon"
                          href="#"
                          aria-label="Next"
                        >
                          <span className="material-symbols-outlined">
                            keyboard_arrow_right
                          </span>
                        </Link>
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
