"use client";

import React, { useState } from "react";
import { Card, Table, Button} from "react-bootstrap";
import Image from "next/image";
import DateTimePickerDemo from "./DateTimePickerDemo";

const PatientAppointments = () => {
  const [appointments, setAppointments] = useState([
    {
      patientName: "Noah",
      date: "Sept 16, 2024",
      time: "10:30 AM",
      doctor: { name: "Dr. Sarah", imgSrc: "/images/user-80.png" },
      department: "Cardiology",
      status: "Confirmed",
      statusClass: "success",
    },
    {
      patientName: "Theo",
      date: "Sep 16, 2024",
      time: "11:00 AM",
      doctor: { name: "Dr. Mark", imgSrc: "/images/user-79.png" },
      department: "Pediatrics",
      status: "Rescheduled",
      statusClass: "danger-div",
    },
    {
      patientName: "Oliver",
      date: "Sep 15, 2024",
      time: "1:00 PM",
      doctor: { name: "Dr. Emily", imgSrc: "/images/user-78.png" },
      department: "Orthopedics",
      status: "Cancelled",
      statusClass: "danger",
    },
    {
      patientName: "George",
      date: "Sep 14, 2024",
      time: "9:30 AM",
      doctor: { name: "Dr. Adam", imgSrc: "/images/user-77.png" },
      department: "Dermatology",
      status: "Confirmed",
      statusClass: "success",
    },
    {
      patientName: "Freddie",
      date: "Sep 13, 2024",
      time: "2:00 PM",
      doctor: { name: "Dr. Rebecca", imgSrc: "/images/user-76.png" },
      department: "Surgery",
      status: "Pending",
      statusClass: "primary-div",
    },
    {
      patientName: "John Doe",
      date: "Sept 12, 2024",
      time: "10:30 AM",
      doctor: { name: "Dr. Sarah", imgSrc: "/images/user-71.png" },
      department: "Cardiology",
      status: "Confirmed",
      statusClass: "success",
    },
    {
      patientName: "Jane Smith",
      date: "Sep 11, 2024",
      time: "11:00 AM",
      doctor: { name: "Dr. Mark", imgSrc: "/images/user-72.png" },
      department: "Pediatrics",
      status: "Rescheduled",
      statusClass: "danger-div",
    },
    {
      patientName: "Robert Clark",
      date: "Sep 10, 2024",
      time: "1:00 PM",
      doctor: { name: "Dr. Emily", imgSrc: "/images/user-73.png" },
      department: "Orthopedics",
      status: "Cancelled",
      statusClass: "danger",
    },
    {
      patientName: "Linda Green",
      date: "Sep 09, 2024",
      time: "9:30 AM",
      doctor: { name: "Dr. Adam", imgSrc: "/images/user-74.png" },
      department: "Dermatology",
      status: "Confirmed",
      statusClass: "success",
    },
    {
      patientName: "Michael White",
      date: "Sep 08, 2024",
      time: "2:00 PM",
      doctor: { name: "Dr. Rebecca", imgSrc: "/images/user-75.png" },
      department: "Surgery",
      status: "Pending",
      statusClass: "primary-div",
    },
  ]);

  // Pagination states
  const [currentPage, setCurrentPage] = useState(1);
  const pageSize = 5;

  // Calculate current page data
  const indexOfLastAppointment = currentPage * pageSize;
  const indexOfFirstAppointment = indexOfLastAppointment - pageSize;
  const currentAppointments = appointments.slice(
    indexOfFirstAppointment,
    indexOfLastAppointment
  );

  // Calculate total pages
  const totalPages = Math.ceil(appointments.length / pageSize);

  // Pagination controls
  const goToPreviousPage = () => {
    if (currentPage > 1) setCurrentPage(currentPage - 1);
  };

  const goToNextPage = () => {
    if (currentPage < totalPages) setCurrentPage(currentPage + 1);
  };

  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-4">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 pb-3">
          <h3 className="mb-0">Patient Appointments</h3>
          <DateTimePickerDemo />
        </div>

        <div className="default-table-area style-two patient-table">
          <div className="table-responsive">
            <Table className="align-middle border-0">
              <thead>
                <tr className="border-bottom">
                  <th scope="col" className="bg-transparent">Patient Name</th>
                  <th scope="col" className="text-end bg-transparent">Date</th>
                  <th scope="col" className="text-end bg-transparent">Time</th>
                  <th scope="col" className="bg-transparent">Assigned</th>
                  <th scope="col" className="text-end bg-transparent">Department</th>
                  <th scope="col" className="text-end bg-transparent">Status</th>
                </tr>
              </thead>
              <tbody>
                {currentAppointments.map((appointment, index) => (
                  <tr key={index}>
                    <td className="fw-medium">{appointment.patientName}</td>
                    <td className="text-end fw-medium text-body">
                      {appointment.date}
                    </td>
                    <td className="text-end fw-medium text-body">
                      {appointment.time}
                    </td>
                    <td className="fw-medium">
                      <div className="d-flex align-items-center">
                        <Image
                          src={appointment.doctor.imgSrc}
                          className="rounded-circle"
                          alt="user"
                          width={34}
                          height={34}
                        />
                        <span className="ps-2 fw-medium">{appointment.doctor.name}</span>
                      </div>
                    </td>
                    <td className="text-end fw-medium text-body">
                      {appointment.department}
                    </td>
                    <td className="text-end">
                      <span className={`d-inline-block py-1 px-2 bg-${appointment.statusClass} bg-opacity-10 rounded-2 text-${appointment.statusClass}`}>
                        {appointment.status}
                      </span>
                    </td>
                  </tr>
                ))}
              </tbody>
            </Table>
          </div>

          <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap mt-4">
            <span className="fs-12 fw-medium">
              Showing {indexOfFirstAppointment + 1} - {Math.min(indexOfLastAppointment, appointments.length)} of {appointments.length} Results
            </span>

            <nav aria-label="Page navigation example">
              <ul className="pagination mb-0 justify-content-center">
                <li className={`page-item ${currentPage === 1 && "disabled"}`}>
                  <Button className="page-link icon" type="button" onClick={goToPreviousPage}>
                    <span className="material-symbols-outlined">
	keyboard_arrow_left
</span>
                  </Button>
                </li>
                <li className={`page-item ${currentPage === totalPages && "disabled"}`}>
                  <Button className="page-link icon" type="button" onClick={goToNextPage}>
                    <span className="material-symbols-outlined">
	keyboard_arrow_right
</span>
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

export default PatientAppointments;
