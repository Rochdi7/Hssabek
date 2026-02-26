"use client";

import { Card, Form, Table } from "react-bootstrap";
import Image from "next/image";
import Pagination from "./Pagination";

const recentLeadsData = [
  {
    customerImg: "/images/user-11.jpg",
    customerName: "David Brown",
    email: "david@trezo.com",
    source: "Organic",
    status: "confirmed",
  },
  {
    customerImg: "/images/user-12.jpg",
    customerName: "Sarah Miller",
    email: "sara@trezo.com",
    source: "Social",
    status: "pending",
  },
  {
    customerImg: "/images/user-13.jpg",
    customerName: "Michael Wilson",
    email: "micheal@trezo.com",
    source: "Website",
    status: "inProgress",
  },
  {
    customerImg: "/images/user-15.jpg",
    customerName: "Amanda Clark",
    email: "amanda@trezo.com",
    source: "Paid",
    status: "confirmed",
  },
  {
    customerImg: "/images/user-16.jpg",
    customerName: "Jennifer Taylor",
    email: "taylor@trezo.com",
    source: "Others",
    status: "rejected",
  },
  {
    customerImg: "/images/user-17.jpg",
    customerName: "Sarah Miller",
    email: "sara@trezo.com",
    source: "Social",
    status: "pending",
  },
  {
    customerImg: "/images/user-18.jpg",
    customerName: "Jennifer Taylor",
    email: "taylor@trezo.com",
    source: "Others",
    status: "rejected",
  },
];

const RecentLeads = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-0">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 p-4">
            <h3 className="mb-0">Recent Leads</h3>

            <Form.Select
              className="month-select form-control p-0 h-auto border-0"
              aria-label="Default select example"
            >
              <option defaultValue="0">Select</option>
              <option defaultValue="1">Today</option>
              <option defaultValue="2">Last Weekly</option>
              <option defaultValue="3">Last Monthly</option>
              <option defaultValue="4">Last Yearly</option>
            </Form.Select>
          </div>

          <div className="default-table-area style-two recent-leads">
            <div className="table-responsive">
              <Table className="align-middle">
                <thead>
                  <tr>
                    <th scope="col">
                      <Form>
                        <Form.Check
                          type="checkbox"
                          id="default-checkbox"
                          label=""
                        />
                      </Form>
                    </th>
                    <th scope="col">Customer</th>
                    <th scope="col">Email</th>
                    <th scope="col">Source</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>

                <tbody>
                  {recentLeadsData &&
                    recentLeadsData.slice(0, 5).map((value, i) => (
                      <tr key={i}>
                        <td>
                          <div className="form-check">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              value=""
                              id="flexCheckDefault2"
                            />
                          </div>
                        </td>

                        <td>
                          <div className="d-flex align-items-center">
                            <Image
                              src={value.customerImg}
                              className="wh-44 rounded-circle"
                              alt="user"
                              width={44}
                              height={44}
                            />
                            <div className="ms-2">
                              <h6 className="fw-medium fs-14 mb-0">
                                {value.customerName}
                              </h6>
                            </div>
                          </div>
                        </td>

                        <td>{value.email}</td>

                        <td>{value.source}</td>

                        <td>
                          <span
                            className={`badge bg-opacity-10 p-2 fs-12 fw-normal text-capitalize ${value.status}`}
                          >
                            {value.status}
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
            </div>

            {/* Pagination */}
            <Pagination />
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default RecentLeads;
