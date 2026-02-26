"use client";

import { Card, Table } from "react-bootstrap";
import SearchForm from "./SearchForm";
import Pagination from "./Pagination";
import Link from "next/link";
import Image from "next/image";

const eventsListData = [
  {
    eventID: "#JAN-258",
    image: "/images/event-1.jpg",
    title: "Annual Conference 2024",
    detailsLink: "/events/details",
    dateAndTime: "01 Dec 2024 09:00 AM",
    location: "Convention Center",
    organizer: "ABC Corporation",
    status: "happening",
  },
  {
    eventID: "#JAN-648",
    image: "/images/event-2.jpg",
    title: "Leadership Summit 2024",
    detailsLink: "/events/details",
    dateAndTime: "10 Dec 2024 03:00 AM",
    location: "Online",
    organizer: "Marketing Pros",
    status: "upcoming",
  },
  {
    eventID: "#JAN-945",
    image: "/images/event-3.jpg",
    title: "Product Launch Webinar",
    detailsLink: "/events/details",
    dateAndTime: "15 Dec 2024 06:00 PM",
    location: "City Sky Lounge",
    organizer: "Tech Solutions Inc.",
    status: "past",
  },
  {
    eventID: "#JAN-186",
    image: "/images/event-4.jpg",
    title: "AI in Healthcare Symposium",
    detailsLink: "/events/details",
    dateAndTime: "20 Dec 2024 09:00 AM",
    location: "Training Center",
    organizer: "Startup Hub",
    status: "upcoming",
  },
  {
    eventID: "#JAN-439",
    image: "/images/event-5.jpg",
    title: "Tech Summit 2024",
    detailsLink: "/events/details",
    dateAndTime: "25 Dec 2024 02:30 PM",
    location: "Tech Park Auditorium",
    organizer: "Community Foundation",
    status: "upcoming",
  },
  {
    eventID: "#JAN-752",
    image: "/images/event-6.jpg",
    title: "Startup Pitch Day",
    detailsLink: "/events/details",
    dateAndTime: "30 Dec 2024 11:00 AM",
    location: "Grand Hotel Ballroom",
    organizer: "FutureTech Solutions",
    status: "upcoming",
  },
  {
    eventID: "#JAN-658",
    image: "/images/event-7.jpg",
    title: "Workshop: Digital Marketing",
    detailsLink: "/events/details",
    dateAndTime: "01 Jan 2024 07:00 AM",
    location: "Innovation Hub",
    organizer: "Leadership Institute",
    status: "upcoming",
  },
  {
    eventID: "#JAN-951",
    image: "/images/event-8.jpg",
    title: "Charity Gala Dinner",
    detailsLink: "/events/details",
    dateAndTime: "10 Jan 2024 03:00PM",
    location: "Medical Center",
    organizer: "XYZ Innovations",
    status: "upcoming",
  },
  {
    eventID: "#JAN-357",
    image: "/images/event-9.jpg",
    title: "Web Development Seminar",
    detailsLink: "/events/details",
    dateAndTime: "20 Jan 2024 01:00 PM",
    location: "Corporate HQ",
    organizer: "DTech Institute",
    status: "past",
  },
  {
    eventID: "#JAN-851",
    image: "/images/event-10.jpg",
    title: "Networking Mixer",
    detailsLink: "/events/details",
    dateAndTime: "30 Jan 2024 10:00 AM",
    location: "Online",
    organizer: "ABC Corporation",
    status: "upcoming",
  },
];

const EventsList = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-lg-4 mb-3">
            <SearchForm />

            <div className="text-end">
              <Link href="/events/create-an-event/">
                <button className="btn btn-outline-primary py-1 px-2 px-sm-4 fs-14 fw-medium rounded-3 hover-bg">
                  <span className="py-sm-1 d-block">
                    <i className="ri-add-line"></i>
                    <span>Add New Event</span>
                  </span>
                </button>
              </Link>
            </div>
          </div>

          <div className="default-table-area all-products">
            <div className="table-responsive">
              <Table className="align-middle">
                <thead>
                  <tr>
                    <th scope="col">Event ID</th>
                    <th scope="col">Event</th>
                    <th scope="col">Date and Time</th>
                    <th scope="col">Location</th>
                    <th scope="col">Organizer</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>

                <tbody>
                  {eventsListData &&
                    eventsListData.slice(0, 10).map((value, i) => (
                      <tr key={i}>
                        <td className="text-body">{value.eventID}</td>

                        <td>
                          <Link
                            href={value.detailsLink}
                            className="d-flex align-items-center"
                          >
                            <Image
                              src={value.image}
                              className="rounded-3"
                              alt="event-1"
                              width={40}
                              height={40}
                            />
                            <div className="ms-2 ps-1">
                              <h6 className="fw-medium fs-14 mb-0">
                                {value.title}
                              </h6>
                            </div>
                          </Link>
                        </td>

                        <td className="text-body">{value.dateAndTime}</td>

                        <td>{value.location}</td>

                        <td className="text-body">{value.organizer}</td>

                        <td>
                          <span
                            className={`badge bg-opacity-10 p-2 fs-12 fw-normal text-capitalize ${value.status}`}
                          >
                            {value.status}
                          </span>
                        </td>

                        <td>
                          <div className="d-flex align-items-center gap-1">
                            <Link href={value.detailsLink}>
                              <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                                <span className="material-symbols-outlined fs-16 text-primary">
                                  visibility
                                </span>
                              </button>
                            </Link>

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

              {/* Pagination */}
              <Pagination />
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default EventsList;
