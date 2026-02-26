"use client";

import { Card, Form, Table } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";

const friendsData = [
  {
    image: "/images/user-6.jpg",
    name: "Alex Davis",
    email: "alex@trezo.com",
    link: "#",
    activeStatus: "bg-danger",
  },
  {
    image: "/images/user-7.jpg",
    name: "Laura Martinez",
    email: "laura@trezo.com",
    link: "#",
    activeStatus: "bg-success",
  },
  {
    image: "/images/user-8.jpg",
    name: "Mark Thompson",
    email: "mark@trezo.com",
    link: "#",
    activeStatus: "bg-success",
  },
  {
    image: "/images/user-9.jpg",
    name: "Rachel White",
    email: "rachel@trezo.com",
    link: "#",
    activeStatus: "bg-success",
  },
  {
    image: "/images/user-10.jpg",
    name: "Kevin Lee",
    email: "kevin@trezo.com",
    link: "#",
    activeStatus: "bg-danger",
  },
];

const Friends = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-0 pb-4">
          <div className="p-4 pb-2">
            <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
              <h3 className="mb-0">Friends</h3>

              <Form.Select
                className="month-select form-control p-0 h-auto border-0"
                aria-label="Default select example"
              >
                <option value="0">Select</option>
                <option value="1">This Month</option>
                <option value="2">Last Month</option>
                <option value="3">Last Year</option>
              </Form.Select>
            </div>

            <Form className="position-relative default-src-form">
              <Form.Control
                type="text"
                className="rounded-2"
                placeholder="Search here"
              />

              <span className="material-symbols-outlined fs-18 position-absolute top-50 start-0 translate-middle-y">
                search
              </span>
            </Form>
          </div>

          <div className="default-table-area style-two">
            <div className="table-responsive">
              <Table className="table align-middle border-0">
                <tbody>
                  {friendsData &&
                    friendsData.slice(0, 5).map((value, i) => (
                      <tr key={i}>
                        <td>
                          <div className="d-flex align-items-center">
                            <div className="flex-shrink-0 position-relative">
                              <Image
                                src={value.image}
                                className="wh-44 rounded-circle"
                                alt="user"
                                width={44}
                                height={44}
                              />
                              <div
                                className={`${value.activeStatus} position-absolute p-1 border border-2 border-white rounded-circle status-position2`}
                              ></div>
                            </div>

                            <div className="flex-grow-1 ms-2 position-relative top-2">
                              <h6 className="mb-0 fs-14 fw-medium">
                                {value.name}
                              </h6>
                              <span className="fs-12 text-body">
                                {value.email}
                              </span>
                            </div>
                          </div>
                        </td>

                        <td className="text-end">
                          <Link
                            href="#"
                            className="wh-35 d-inline-block border text-center lh-35 rounded-circle text-decoration-none hover-bg"
                          >
                            <i className="ri-arrow-right-up-line fs-18"></i>
                          </Link>
                        </td>
                      </tr>
                    ))}
                </tbody>
              </Table>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default Friends;
