"use client";

import React, { useState } from "react";
import Image from "next/image";
import { Card, Table } from "react-bootstrap";
import Link from "next/link";

const PatientsListTable = () => {
  const patientsData = [
    {
      id: "001",
      name: "Johhna Loren",
      email: "lorenjohna@gmail.com",
      phone: "+321 1234 5678",
      disease: "Heart Attack",
      appointmentDate: "05 Nov, 2024",
      image: "/images/user-151.png",
    },
    {
      id: "002",
      name: "Michael Scott",
      email: "michael.scott@dundermifflin.com",
      phone: "+123 4567 8901",
      disease: "Flu",
      appointmentDate: "10 Feb, 2025",
      image: "/images/user-152.png",
    },
    {
      id: "003",
      name: "Sarah Connor",
      email: "sarah.connor@skynet.com",
      phone: "+987 6543 210",
      disease: "Fracture",
      appointmentDate: "15 Mar, 2025",
      image: "/images/user-153.png",
    },
    {
      id: "004",
      name: "Tony Stark",
      email: "tony@starkindustries.com",
      phone: "+111 2222 3333",
      disease: "Anemia",
      appointmentDate: "12 Apr, 2025",
      image: "/images/user-154.png",
    },
    {
      id: "005",
      name: "Bruce Wayne",
      email: "bruce@wayneenterprises.com",
      phone: "+444 5555 6666",
      disease: "Insomnia",
      appointmentDate: "20 May, 2025",
      image: "/images/user-155.png",
    },
    {
      id: "006",
      name: "Diana Prince",
      email: "diana@amazon.com",
      phone: "+777 8888 9999",
      disease: "Migraine",
      appointmentDate: "30 Jun, 2025",
      image: "/images/user-155.png",
    },
    {
      id: "007",
      name: "Clark Kent",
      email: "clark@dailyplanet.com",
      phone: "+000 1234 5678",
      disease: "Kryptonite Allergy",
      appointmentDate: "15 Jul, 2025",
      image: "/images/user-157.png",
    },
    {
      id: "008",
      name: "Peter Parker",
      email: "peter@dailybugle.com",
      phone: "+555 6789 1234",
      disease: "Spider Bite Infection",
      appointmentDate: "22 Aug, 2025",
      image: "/images/user-158.png",
    },
    {
      id: "009",
      name: "Walter White",
      email: "walter@breakingbad.com",
      phone: "+666 1111 2222",
      disease: "Lung Cancer",
      appointmentDate: "05 Sep, 2025",
      image: "/images/user-159.png",
    },
    {
      id: "010",
      name: "Sherlock Holmes",
      email: "sherlock@221bbaker.com",
      phone: "+333 4444 5555",
      disease: "Nicotine Addiction",
      appointmentDate: "10 Oct, 2025",
      image: "/images/user-160.png",
    },
    {
      id: "011",
      name: "Arya Stark",
      email: "arya@winterfell.com",
      phone: "+999 8888 7777",
      disease: "Sword Injury",
      appointmentDate: "15 Nov, 2025",
      image: "/images/user-161.png",
    },
    {
      id: "012",
      name: "Jon Snow",
      email: "jon@nightswatch.com",
      phone: "+555 4444 3333",
      disease: "Hypothermia",
      appointmentDate: "20 Dec, 2025",
      image: "/images/user-162.png",
    },
    {
      id: "013",
      name: "Frodo Baggins",
      email: "frodo@shire.com",
      phone: "+777 6666 5555",
      disease: "Ring Addiction",
      appointmentDate: "25 Jan, 2026",
      image: "/images/user-163.png",
    },
    {
      id: "014",
      name: "Sam Winchester",
      email: "sam@supernatural.com",
      phone: "+222 3333 4444",
      disease: "Demonic Possession",
      appointmentDate: "05 Feb, 2026",
      image: "/images/user-164.png",
    },
    {
      id: "015",
      name: "Dean Winchester",
      email: "dean@supernatural.com",
      phone: "+111 9999 8888",
      disease: "Ghostly Encounters PTSD",
      appointmentDate: "15 Mar, 2026",
      image: "/images/user-165.png",
    },
    {
      id: "016",
      name: "Jack Sparrow",
      email: "jack@pirates.com",
      phone: "+444 7777 9999",
      disease: "Scurvy",
      appointmentDate: "25 Apr, 2026",
      image: "/images/user-166.png",
    },
    {
      id: "017",
      name: "Luke Skywalker",
      email: "luke@jediorder.com",
      phone: "+333 2222 1111",
      disease: "Lightsaber Burn",
      appointmentDate: "10 May, 2026",
      image: "/images/user-167.png",
    },
    {
      id: "018",
      name: "Harry Potter",
      email: "harry@hogwarts.com",
      phone: "+555 1111 2222",
      disease: "Dark Magic Exposure",
      appointmentDate: "20 Jun, 2026",
      image: "/images/user-168.png",
    },
    {
      id: "019",
      name: "Ellen Ripley",
      email: "ellen@nostromo.com",
      phone: "+999 5555 4444",
      disease: "Alien Parasite Infection",
      appointmentDate: "30 Jul, 2026",
      image: "/images/user-169.png",
    },
    {
      id: "020",
      name: "Neo Anderson",
      email: "neo@matrix.com",
      phone: "+777 3333 1111",
      disease: "Reality Distortion Syndrome",
      appointmentDate: "15 Aug, 2026",
      image: "/images/user-170.png",
    },
  ];

  const [searchTerm, setSearchTerm] = useState("");
  const [currentPage, setCurrentPage] = useState(1);
  const patientsPerPage = 10;

  // 🔍 Filter patients based on search term
  const filteredPatients = patientsData.filter((patient) =>
    Object.values(patient).some((value) =>
      value.toString().toLowerCase().includes(searchTerm.toLowerCase())
    )
  );

  // 📝 Pagination logic
  const indexOfLastPatient = currentPage * patientsPerPage;
  const indexOfFirstPatient = indexOfLastPatient - patientsPerPage;
  const currentPatients = filteredPatients.slice(
    indexOfFirstPatient,
    indexOfLastPatient
  );
  const totalPages = Math.ceil(filteredPatients.length / patientsPerPage);

  const goToNextPage = () => {
    if (currentPage < totalPages) setCurrentPage(currentPage + 1);
  };

  const goToPrevPage = () => {
    if (currentPage > 1) setCurrentPage(currentPage - 1);
  };

  const setPage = (pageNumber) => {
    setCurrentPage(pageNumber);
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-20">
            <form className="position-relative table-src-form me-0">
              <input
                type="text"
                className="form-control bg-body-bg border-body-bg ps-3"
                style={{
                  width: "260px",
                  height: "40px",
                }}
                placeholder="Search here..."
                value={searchTerm}
                onChange={(e) => {
                  setSearchTerm(e.target.value);
                  setCurrentPage(1); // Reset to first page when searching
                }}
              />
              <button
                className="bg-transparent p-0 pe-3 lh-1 border-0 position-absolute top-50 end-0 translate-middle-y text-primary"
                type="button"
              >
                <i className="material-symbols-outlined position-relative top-2 pe-3">
                  search
                </i>
              </button>
            </form>

            <Link
              href="/doctor/add-patient/"
              className="btn btn-outline-primary fs-14 fw-medium rounded-3 hover-bg"
              style={{
                padding: "3px 13px",
                lineHeight: 1,
              }}
            >
              <span className="py-sm-1 d-block">
                <i className="ri-add-line d-none d-sm-inline-block fs-18 position-relative top-1"></i>
                <span>Add New Patient</span>
              </span>
            </Link>
          </div>

          <div className="default-table-area style-two campaigns-table latest-transaction-table doctor-patients-table">
            <div className="table-responsive">
              <Table className="align-middle border-0">
                <thead>
                  <tr className="border-bottom">
                    <th
                      scope="col"
                      className="bg-transparent text-body fw-medium pt-0 pb-2"
                    >
                      <span className="fs-10 fw-bold letter-spacing-1 text-body-color-60">
                        CODE
                      </span>
                    </th>
                    <th
                      scope="col"
                      className="bg-transparent text-body fw-medium pt-0 pb-2"
                    >
                      <span className="fs-10 fw-bold letter-spacing-1 text-body-color-60">
                        PATIENT
                      </span>
                    </th>
                    <th
                      scope="col"
                      className="bg-transparent text-body fw-medium pt-0 pb-2"
                    >
                      <span className="fs-10 fw-bold letter-spacing-1 text-body-color-60">
                        EMAIL
                      </span>
                    </th>
                    <th
                      scope="col"
                      className="bg-transparent text-body fw-medium pt-0 pb-2"
                    >
                      <span className="fs-10 fw-bold letter-spacing-1 text-body-color-60">
                        PHONE NO.
                      </span>
                    </th>
                    <th
                      scope="col"
                      className="bg-transparent text-body fw-medium pt-0 pb-2"
                    >
                      <span className="fs-10 fw-bold letter-spacing-1 text-body-color-60">
                        DISEASE
                      </span>
                    </th>
                    <th
                      scope="col"
                      className="bg-transparent text-body fw-medium pt-0 pb-2"
                    >
                      <span className="fs-10 fw-bold letter-spacing-1 text-body-color-60">
                        APPOINT. DATE
                      </span>
                    </th>
                    <th
                      scope="col"
                      className="text-end bg-transparent text-body fw-medium pt-0 pb-2"
                    >
                      <span className="fs-10 fw-bold letter-spacing-1 text-body-color-60">
                        ACTION
                      </span>
                    </th>
                  </tr>
                </thead>

                <tbody>
                  {currentPatients.length > 0 ? (
                    currentPatients.map((patient) => (
                      <tr key={patient.id}>
                        <td className="fs-12 fw-semibold text-body">
                          <div className="form-check d-flex gap-2 align-items-center">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              value=""
                              id={`check-${patient.id}`}
                            />
                            <label
                              className="position-relative top-3 fw-semibold fs-12"
                              htmlFor={`check-${patient.id}`}
                            >
                              #{patient.id}
                            </label>
                          </div>
                        </td>

                        <td>
                          <div className="d-flex align-items-center">
                            <div className="flex-shrink-0">
                              <Image
                                src={patient.image}
                                className="rounded-circle"
                                alt="nft"
                                width={35}
                                height={35}
                              />
                            </div>
                            <div className="flex-grow-1 ms-2">
                              <h4
                                className="fs-14 fw-semibold mb-0"
                                style={{ color: "#23272E" }}
                              >
                                {patient.name}
                              </h4>
                            </div>
                          </div>
                        </td>

                        <td className="fs-12 fw-semibold text-primary">
                          {patient.email}
                        </td>

                        <td className="fs-12 fw-semibold text-body">
                          {patient.phone}
                        </td>

                        <td className="fs-12 fw-semibold text-body">
                          {patient.disease}
                        </td>

                        <td className="fs-12 fw-semibold text-body">
                          {patient.appointmentDate}
                        </td>

                        <td>
                          <div className="d-flex align-items-center justify-content-end gap-1">
                            <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                              <i className="material-symbols-outlined fs-16 text-primary">
                                visibility
                              </i>
                            </button>
                            <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                              <i className="material-symbols-outlined fs-16 text-body">
                                edit
                              </i>
                            </button>
                            <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                              <i className="material-symbols-outlined fs-16 text-danger">
                                delete
                              </i>
                            </button>
                          </div>
                        </td>
                      </tr>
                    ))
                  ) : (
                    <tr>
                      <td colSpan="7" className="text-center text-muted">
                        No results found.
                      </td>
                    </tr>
                  )}
                </tbody>
              </Table>
            </div>

            <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap mt-4">
              <span className="fs-12 fw-medium">
                Showing {currentPatients.length} of {patientsData.length}{" "}
                results
              </span>

              <nav aria-label="Page navigation example">
                <ul className="pagination mb-0 justify-content-center">
                  <li className="page-item">
                    <button
                      className={`page-link icon hover-bg ${
                        currentPage === 1 ? "disabled" : ""
                      }`}
                      onClick={goToPrevPage}
                    >
                      <i className="material-symbols-outlined">
                        keyboard_arrow_left
                      </i>
                    </button>
                  </li>

                  {Array.from({ length: totalPages }, (_, i) => (
                    <li key={i} className="page-item">
                      <button
                        className={`page-link ${
                          currentPage === i + 1 ? "active" : ""
                        }`}
                        onClick={() => setPage(i + 1)}
                      >
                        {i + 1}
                      </button>
                    </li>
                  ))}

                  <li className="page-item">
                    <button
                      className={`page-link icon hover-bg ${
                        currentPage === totalPages ? "disabled" : ""
                      }`}
                      onClick={goToNextPage}
                    >
                      <i className="material-symbols-outlined">
                        keyboard_arrow_right
                      </i>
                    </button>
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

export default PatientsListTable;
