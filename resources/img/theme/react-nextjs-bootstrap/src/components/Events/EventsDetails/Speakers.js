"use client";

import { Card, Table } from "react-bootstrap";
import Image from "next/image";

const speakersData = [
  {
    image: "/images/user-1.jpg",
    name: "Sarah Johnson",
    topic: "Opening Keynote",
  },
  {
    image: "/images/user-2.jpg",
    name: "Russell Colon",
    topic: "Panel Discussion: Future Trends",
  },
  {
    image: "/images/user-3.jpg",
    name: "Cynthia Baggett",
    topic: "Interactive Workshops",
  },
  {
    image: "/images/user-4.jpg",
    name: "Raymond Nguyen",
    topic: "Networking Reception",
  },
]

const Speakers = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="default-table-area speaker-table">
            <div className="table-responsive">
              <Table className="table align-middle">
                <thead>
                  <tr>
                    <th scope="col">Speaker</th>
                    <th scope="col">Topic</th>
                  </tr>
                </thead>
                <tbody>

                {speakersData &&
                    speakersData.slice(0, 5).map((value, i) => (
                  <tr key={i}>
                    <td>
                      <div className="d-flex align-items-center">
                        <Image
                          src={value.image}
                          className="wh-40 rounded-3"
                          alt="user-1"
                          width={40}
                          height={40}
                        />
                        <div className="ms-2 ps-1">
                          <h6 className="fw-medium fs-14 mb-0">
                            {value.name}
                          </h6>
                        </div>
                      </div>
                    </td>
                    <td className="text-body">{value.topic}</td>
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

export default Speakers;
