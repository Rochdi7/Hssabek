"use client";

import React from "react";
import Image from "next/image"; 

const Prescriptions = () => {
  return (
    <>
      <div className="main-content-container overflow-hidden">
        <div className="card bg-white border-0 rounded-3 mb-4">
          <div
            className="card-body custom-padding-30"
            style={{
              paddingTop: "35px",
              paddingBottom: "26px",
            }}
          >
            <div className="d-flex flex-wrap gap-2 justify-content-between">
              <div>
                <h3 className="fs-20 fw-semibold">Dr. Walter White</h3>
                <span className="fs-16 d-block text-body-color-60 mb-1">
                  MBBS, MD, MS (Reg No: 321456)
                </span>
                <span className="fs-16 text-secondary">
                  Mobile No:+321 4567 5643
                </span>
              </div>
              <div>
                <Image
                  src="/images/trezo-clinic.png"
                  className="mb-2 doctor-filter-img"
                  alt="trezo-clinic"
                  width={174}
                  height={24}
                />
                <span className="fs-16 d-block text-body-color-50 mb-1">
                  S. Arrowhead Court Branford9
                </span>
                <span className="fs-16 text-body-color-50">
                  +1 444 266 5599
                </span>
              </div>
            </div>
          </div>

          <div className="border-bottom"></div>

          <div className="card-body custom-padding-30 pt-4 pb-0">
            <Image
              src="/images/bar-code.png"
              className="mb-20 doctor-filter-img"
              alt="bar-code"
              width={145}
              height={47}
            />
            <div
              className="d-flex flex-wrap gap-2 justify-content-between"
              style={{
                marginBottom: "50px",
              }}
            >
              <ul className="ps-0 mb-0 list-unstyled last-child-none">
                <li>
                  <p>
                    ID: <span className="text-secondary">321456</span>
                  </p>
                </li>
                <li>
                  <p>
                    Name: <span className="text-secondary">Jane Ronan</span>
                  </p>
                </li>
                <li>
                  <p>
                    Address:{" "}
                    <span className="text-secondary">Bradford, UK</span>
                  </p>
                </li>
                <li>
                  <p>
                    Temperature(Fahrenheit):{" "}
                    <span className="text-secondary">101 degree</span>
                  </p>
                </li>
                <li>
                  <p>
                    Blood Pressure:{" "}
                    <span className="text-secondary">85/123</span>
                  </p>
                </li>
              </ul>
              <span className="fs-14 fw-semibold text-secondary pe-5">
                Date: 07 November, 2024
              </span>
            </div>
            <span className="fs-20 fw-semibold text-secondary">R</span>
          </div>

          <div className="default-table-area style-three style-two type-prescription">
            <div className="table-responsive">
              <table className="table border-0">
                <thead>
                  <tr>
                    <th
                      scope="col"
                      className="bg-body-bg"
                      style={{
                        paddingTop: "10px",
                        paddingBottom: "10px",
                      }}
                    >
                      <span className="fs-14 fw-medium text-body">
                        Medicine Name
                      </span>
                    </th>
                    <th
                      scope="col"
                      className="bg-body-bg"
                      style={{
                        paddingTop: "10px",
                        paddingBottom: "10px",
                      }}
                    >
                      <span className="fs-14 fw-medium text-body">Dosage</span>
                    </th>
                    <th
                      scope="col"
                      className="bg-body-bg"
                      style={{
                        paddingTop: "10px",
                        paddingBottom: "10px",
                      }}
                    >
                      <span className="fs-14 fw-medium text-body">
                        Duration
                      </span>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <span className="fs-14 fw-semibold text-secondary">
                        1. Tab. Ibuprofen
                      </span>
                    </td>
                    <td>
                      <span className="fs-14 fw-semibold text-secondary d-block">
                        1 Morning - 1 Night
                      </span>
                      <span className="fs-12 text-secondary">
                        (Before Food)
                      </span>
                    </td>
                    <td>
                      <span className="fs-14 fw-semibold text-secondary d-block">
                        10 Days
                      </span>
                      <span className="fs-12 text-secondary">
                        (Total 20 Tablets)
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span className="fs-14 fw-semibold text-secondary">
                        2. Cap. Acetaminophen
                      </span>
                    </td>
                    <td>
                      <span className="fs-14 fw-semibold text-secondary d-block">
                        1 Morning - 1 Midday - 1 Night
                      </span>
                      <span className="fs-12 text-secondary">(After Food)</span>
                    </td>
                    <td>
                      <span className="fs-14 fw-semibold text-secondary d-block">
                        10 Days
                      </span>
                      <span className="fs-12 text-secondary">
                        (Total 20 Tablets)
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span className="fs-14 fw-semibold text-secondary">
                        3. Tab. Naproxen
                      </span>
                    </td>
                    <td>
                      <span className="fs-14 fw-semibold text-secondary d-block">
                        1 Morning - 1 Night
                      </span>
                      <span className="fs-12 text-secondary">(After Food)</span>
                    </td>
                    <td>
                      <span className="fs-14 fw-semibold text-secondary d-block">
                        10 Days
                      </span>
                      <span className="fs-12 text-secondary">
                        (Total 20 Tablets)
                      </span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div className="border-bottom"></div>

          <div
            className="card-body custom-padding-30 pt-4"
            style={{
              paddingBottom: "75px",
            }}
          >
            <div>
              <h3 className="fs-14 text-secondary fw-normal">Advice Given:</h3>
              <ul className="ps-0 mb-0 list-unstyled last-child-none">
                <li className="d-flex">
                  <div className="flex-shrink-0">
                    <span
                      style={{
                        width: "5px",
                        height: "5px",
                        backgroundColor: "#B1BBC8",
                      }}
                      className="rounded-circle d-inline-block"
                    ></span>
                  </div>
                  <div className="flex-grow-1 ms-10">
                    <p className="mb-0">Avoid Oily and spicy food.</p>
                  </div>
                </li>
              </ul>
            </div>

            <div className="ms-auto mt-3 mt-sm-0" style={{ maxWidth: "227px" }}>
              <div className="border-bottom mb-4 pb-1 text-center border-border-color-50">
                <Image
                  src="/images/signature.png"
                  className="doctor-filter-img"
                  alt="signature"
                  width={77}
                  height={38}
                />
              </div>
              <h3 className="fs-14 fw-semibold">Dr. Walter White</h3>
              <span className="fs-12 text-body-color-60">
                MBBS, MD, MS (Reg No: 321456)
              </span>
            </div>
          </div>
        </div>
      </div>

      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <button className="btn btn-danger text-white fs-16 fw-medium px-3">
          Print
        </button>

        <button className="btn btn-primary fs-16 fw-medium px-3">
          Download PDF
        </button>
      </div>
    </>
  );
};

export default Prescriptions;
