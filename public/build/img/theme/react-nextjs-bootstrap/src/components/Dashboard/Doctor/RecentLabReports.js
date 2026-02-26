"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";
import Image from "next/image";

const RecentLabReports = () => {
  const [reports, setReports] = useState([]);

  useEffect(() => {
    // Simulate fetching data from an API
    setTimeout(() => {
      setReports([
        { id: 1, name: "Blood Report.pdf", type: "pdf", submittedBy: "Andrew" },
        { id: 2, name: "X-ray Report.jpg", type: "jpg", submittedBy: "Joanna" },
        { id: 3, name: "Creatinine.pdf", type: "pdf", submittedBy: "David" },
        { id: 4, name: "Blood Report.pdf", type: "pdf", submittedBy: "Zinia" },
        { id: 5, name: "Blood Report.doc", type: "doc", submittedBy: "Andrew" },
        { id: 6, name: "ECG Report.doc", type: "doc", submittedBy: "Bella" },
        {
          id: 7,
          name: "Blood Report.pdf",
          type: "pdf",
          submittedBy: "Jonathon",
        },
      ]);
    }, 1000);
  }, []);

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h3 className="mb-4">Recent Lab Report</h3>

          <div
            className="last-child-none"
            style={{
              maxHeight: "407px",
              overflowY: "auto",
            }}
          >
            {reports.length > 0 ? (
              reports.map((report) => (
                <div
                  key={report.id}
                  className="child border-bottom pb-3 mb-3 d-flex flex-wrap gap-2 justify-content-between"
                >
                  <div className="d-flex align-items-center">
                    <div className="flex-shrink-0">
                      <Image
                        src={`/images/${report.type}.png`}
                        alt="pdf"
                        width={30}
                        height={30}
                      />
                    </div>
                    <div className="flex-grow-1 ms-2">
                      <h3 className="fw-semibold fs-14 mb-0">{report.name}</h3>
                      <span className="fs-12">
                        submitted by{" "}
                        <span className="text-secondary">
                          {report.submittedBy}
                        </span>
                      </span>
                    </div>
                  </div>
                  <button className="p-0 border-0 bg-transparent text-primary">
                    <span className="material-symbols-outlined">download</span>
                  </button>
                </div>
              ))
            ) : (
              <p className="text-center">Loading reports...</p>
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default RecentLabReports;
