"use client";

import { Card, Table } from "react-bootstrap";
import Image from "next/image";
import { useState } from "react";

const Teachers = () => {
  // Sample dynamic teacher data
  const [teachers] = useState([
    {
      name: "Sarah W.",
      email: "sarah@trezo.com",
      subject: "Mathematics",
      image: "/images/user-1.jpg",
    },
    {
      name: "Michael T.",
      email: "michael@trezo.com",
      subject: "English",
      image: "/images/user-2.jpg",
    },
    {
      name: "Emily J.",
      email: "emily@trezo.com",
      subject: "History",
      image: "/images/user-3.jpg",
    },
    {
      name: "David A.",
      email: "david@trezo.com",
      subject: "Art",
      image: "/images/user-4.jpg",
    },
    {
      name: "Jessica M.",
      email: "jessica@trezo.com",
      subject: "Music",
      image: "/images/user-5.jpg",
    },
  ]);

  return (
    <>
      <Card className="rounded-3 bg-white border-0 mb-4 custom-padding-30 pt-0 px-0">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 custom-padding-30 border-bottom pb-4 custom-padding-30">
          <h3 className="mb-0">Teachers</h3>

          <button type="button" className="btn p-0 text-decoration-none">
            <span>View All</span>
            <i className="ri-arrow-right-s-line fs-18 position-relative top-1"></i>
          </button>
        </div>

        <div className="default-table-area style-three teachers">
          <div className="table-responsive">
            <Table className="align-middle border-0">
              <thead className="border-bottom">
                <tr>
                  <th scope="col" className="bg-transparent fw-normal lh-1 py-2">
                    Name
                  </th>
                  <th scope="col" className="bg-transparent fw-normal lh-1 py-2 text-end">
                    Subject
                  </th>
                </tr>
              </thead>
              <tbody>
                {teachers.map((teacher, index) => (
                  <tr key={index} className="tr-lcbp-none">
                    <td>
                      <div className="d-flex align-items-center">
                        <div className="flex-shrink-0">
                          <Image
                            src={teacher.image}
                            className="rounded-circle"
                            alt="user"
                            width={40}
                            height={40}
                          />
                        </div>
                        <div className="flex-grow-1 ms-2">
                          <h4 className="fs-14 fw-medium mb-0">{teacher.name}</h4>
                          <span className="fs-12 text-body">{teacher.email}</span>
                        </div>
                      </div>
                    </td>
                    <td className="fw-medium text-end">{teacher.subject}</td>
                  </tr>
                ))}
              </tbody>
            </Table>
          </div>
        </div>
      </Card>
    </>
  );
};

export default Teachers;
