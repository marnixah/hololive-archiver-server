from sqlalchemy_serializer import SerializerMixin
from flask_sqlalchemy import SQLAlchemy

db = SQLAlchemy()


class live_job(db.Model, SerializerMixin):
    __tablename__ = 'live_jobs'
    id = db.Column(db.Integer, primary_key=True, nullable=False)
    status = db.Column(db.String, index=True, nullable=False)
    save_location = db.Column(db.String, nullable=False)
    url = db.Column(db.String, unique=True, nullable=False)
    error = db.Column(db.String, nullable=True)

    def __init__(self, url, save_location, status="pending"):
        self.url = url
        self.save_location = save_location
        self.status = status
        self.error = None