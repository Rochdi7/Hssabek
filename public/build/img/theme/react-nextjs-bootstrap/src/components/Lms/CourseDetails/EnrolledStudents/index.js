"use client";

import { Dropdown, Card, Table } from "react-bootstrap";
import Image from "next/image";
import Pagination from "./Pagination";

const enrolledStudentsData = [
  {
    id: "#A-1217",
    img: "/images/user-13.jpg",
    name: "Olivia Clark",
    email: "olivia@trezo.com",
  },
  {
    id: "#A1364",
    img: "/images/user-16.jpg",
    name: "Ava Turner",
    email: "ava@trezo.com",
  },
  {
    id: "#A-2951",
    img: "/images/user-17.jpg",
    name: "Lucas Morgan",
    email: "lucas@trezo.com",
  },
  {
    id: "#A-7342",
    img: "/images/user-18.jpg",
    name: "Isabella Cooper",
    email: "isabella@trezo.com",
  },
  {
    id: "#A-1217",
    img: "/images/user-13.jpg",
    name: "Olivia Clark",
    email: "olivia@trezo.com",
  },
  {
    id: "#A1364",
    img: "/images/user-16.jpg",
    name: "Ava Turner",
    email: "ava@trezo.com",
  },
  {
    id: "#A-2951",
    img: "/images/user-17.jpg",
    name: "Lucas Morgan",
    email: "lucas@trezo.com",
  },
  {
    id: "#A-7342",
    img: "/images/user-18.jpg",
    name: "Isabella Cooper",
    email: "isabella@trezo.com",
  },
];

const EnrolledStudents = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-0">
          <div className="p-4">
            <div className="d-flex justify-content-between align-items-center flex-wrap gap-3">
              <h3 className="mb-0">Enrolled Students</h3>

              <Dropdown className="action-opt">
                <Dropdown.Toggle
                  variant="secondary"
                  id="dropdown-basic"
                  className="bg-transparent p-0"
                >
                  <span className="material-symbols-outlined">more_horiz</span>
                </Dropdown.Toggle>

                <Dropdown.Menu className="bg-white border box-shadow">
                  <Dropdown.Item href="#">
                    <span className="material-symbols-outlined">schedule</span>
                    Today
                  </Dropdown.Item>

                  <Dropdown.Item href="#">
                    <span className="material-symbols-outlined">pie_chart</span>
                    Last 7 Days
                  </Dropdown.Item>

                  <Dropdown.Item href="#">
                    <i className="material-symbols-outlined">refresh</i>
                    Last Month
                  </Dropdown.Item>

                  <Dropdown.Item href="#">
                    <span className="material-symbols-outlined">
                      calendar_today
                    </span>
                    Last 1 Year
                  </Dropdown.Item>

                  <Dropdown.Item href="#">
                    <span className="material-symbols-outlined">bar_chart</span>
                    All Time
                  </Dropdown.Item>

                  <Dropdown.Item href="#">
                    <i className="material-symbols-outlined">visibility</i>
                    View
                  </Dropdown.Item>

                  <Dropdown.Item href="#">
                    <i className="material-symbols-outlined">delete</i>
                    Delete
                  </Dropdown.Item>
                </Dropdown.Menu>
              </Dropdown>
            </div>
          </div>

          <div className="default-table-area style-two top-instructors">
            <div className="table-responsive">
              <Table className="table align-middle border-0">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                  {enrolledStudentsData &&
                    enrolledStudentsData.slice(0, 4).map((value, i) => (
                      <tr key={i}>
                        <td>{value.id}</td>

                        <td>
                          <div className="d-flex align-items-center">
                            <div className="flex-shrink-0">
                              <Image
                                src={value.img}
                                className="wh-44 rounded-circle"
                                alt="user"
                                width={44}
                                height={44}
                              />
                            </div>
                            <div className="flex-grow-1 ms-2 position-relative top-2">
                              <h6 className="mb-0 fs-14 fw-medium">
                                {value.name}
                              </h6>
                            </div>
                          </div>
                        </td>

                        <td>{value.email}</td>
                      </tr>
                    ))}
                </tbody>
              </Table>
            </div>
          </div>

          {/* Pagination */}
          <Pagination />
        </Card.Body>
      </Card>
    </>
  );
};

export default EnrolledStudents;
